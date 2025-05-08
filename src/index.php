<?php
header('Content-Type: application/json');

$host = 'mysql';
$db = 'meu_banco';
$user = 'meu_usuario';
$pass = 'minha_senha';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['erro' => 'Erro na conexão: ' . $e->getMessage()]);
    exit;
}

$pdo->exec("
    CREATE TABLE IF NOT EXISTS carros (
        id INT AUTO_INCREMENT PRIMARY KEY,
        marca VARCHAR(100) NOT NULL,
        modelo VARCHAR(100) NOT NULL,
        ano INT NOT NULL
    );
");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents("php://input"), true);

$uri = $_SERVER['REQUEST_URI'];
$uriParts = explode('/', trim(parse_url($uri, PHP_URL_PATH), '/'));
$id = null;

if (isset($uriParts[1]) && is_numeric($uriParts[1])) {
    $id = (int) $uriParts[1];
}

switch ($method) {
    case 'GET':
        if ($id) {
            $stmt = $pdo->prepare("SELECT * FROM carros WHERE id = ?");
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $stmt = $pdo->query("SELECT * FROM carros");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode($result);
        break;

    case 'POST':
        if (!isset($input['marca'], $input['modelo'], $input['ano'])) {
            http_response_code(400);
            echo json_encode(['erro' => 'Dados incompletos']);
            exit;
        }
        $stmt = $pdo->prepare("INSERT INTO carros (marca, modelo, ano) VALUES (?, ?, ?)");
        $stmt->execute([$input['marca'], $input['modelo'], $input['ano']]);
        echo json_encode(['status' => 'Carro inserido']);
        break;

    case 'PUT':
        $putVars = $input;

        if (!$id || !isset($putVars['marca'], $putVars['modelo'], $putVars['ano'])) {
            http_response_code(400);
            echo json_encode(['erro' => 'Dados incompletos para atualização']);
            exit;
        }
        $stmt = $pdo->prepare("UPDATE carros SET marca = ?, modelo = ?, ano = ? WHERE id = ?");
        $stmt->execute([$putVars['marca'], $putVars['modelo'], $putVars['ano'], $id]);
        echo json_encode(['status' => 'Carro atualizado']);
        break;

    case 'DELETE':
        if (!$id) {
            http_response_code(400);
            echo json_encode(['erro' => 'ID necessário para exclusão']);
            exit;
        }
        $stmt = $pdo->prepare("DELETE FROM carros WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode(['status' => 'Carro excluído']);
        break;

    default:
        http_response_code(405);
        echo json_encode(['erro' => 'Método não permitido']);
        break;
}
