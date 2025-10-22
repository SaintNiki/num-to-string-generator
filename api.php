<?php

$header = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'en';
$lang = strtolower(substr($header, 0, 2));
require_once 'autoload.php';
use Converter\Converter;
use Validator\Validator;

if(!empty($_GET))
{
    header('Content-Type: application/json; charset=utf-8');
    if(isset($_GET['int']) && !empty($_GET['lang']))
    {
        $language = strtolower($_GET['lang']);
        $input = $_GET['int'];

        $validator = new Validator();
        $clean = $validator->validate($input, $language);
        $converter = new Converter($language);

        $result = $converter->convertString($clean);

        echo json_encode(['result' => $result]);
        exit;
    } else {
        $result = ['error' => 'Missing int or lang parameter'];
        echo json_encode($result);
        exit;
    }
}




switch($lang)
{
    case 'de':
        $texts = [
            'title' => 'API zur Umwandlung von Zahlen in Text',
            'description' => 'Diese einfache API akzeptiert eine Zahl und eine Sprache und gibt die Zahl als Text zurück.',
            'method' => 'GET-Anfrage an <p>https://numtostring.grishakin.tech/api</p>',
            'parameters' => 'Parameter der Anfrage',
            'paramInt' => 'int',
            'paramIntDesc' => 'Beliebige ganze Zahl, die in Text umgewandelt werden soll.',
            'paramLang' => 'lang',
            'paramLangDesc' => 'Sprache der Umwandlung. Mögliche Werte:',
            'values' => ['russian' => 'Russisch', 'english' => 'Englisch', 'deutsch' => 'Deutsch'],
            'exampleRequest' => 'Beispielanfrage',
            'exampleResponse' => 'Beispielantwort',
            'error' => 'Fehler',
            'errorText' => 'Wenn Parameter fehlen oder ungültig sind, gibt die API JSON mit einer Fehlermeldung zurück:',
            'notes' => 'Hinweise',
            'notesList' => [
                'Parameter sind <strong>nicht</strong> case-sensitive (Sie können Groß- oder Kleinschreibung verwenden).',
                'Die Zahl muss eine positive ganze Zahl sein.',
                'Die Antwort wird immer im JSON-Format zurückgegeben.'
            ]
        ];
    break;
    case 'en':
        $texts = [
            'title' => 'API for converting numbers to text',
            'description' => 'This simple API accepts a number and a language and returns the number as text.',
            'method' => 'GET request to <p>https://numtostring.grishakin.tech/api</p>',
            'parameters' => 'Request Parameters',
            'paramInt' => 'int',
            'paramIntDesc' => 'Any integer number you want to convert to text.',
            'paramLang' => 'lang',
            'paramLangDesc' => 'Language of conversion. Allowed values:',
            'values' => ['russian' => 'Russian', 'english' => 'English', 'deutsch' => 'German'],
            'exampleRequest' => 'Example Request',
            'exampleResponse' => 'Example Response',
            'error' => 'Errors',
            'errorText' => 'If parameters are missing or invalid, the API returns JSON with an error message:',
            'notes' => 'Notes',
            'notesList' => [
                'Parameters are <strong>not</strong> case-sensitive (uppercase or lowercase can be used).',
                'The number must be a positive integer.',
                'Response is always returned in JSON format.'
            ]
        ];
    break;
    case 'ru':
        $texts = [
            'title' => 'API для преобразования числа в строку',
            'description' => 'Это простое API принимает число и язык, и возвращает строковое представление числа.',
            'method' => 'GET-запрос на <p>https://numtostring.grishakin.tech/api</p>',
            'parameters' => 'Параметры запроса',
            'paramInt' => 'int',
            'paramIntDesc' => 'Любое целое число, которое вы хотите конвертировать в текст.',
            'paramLang' => 'lang',
            'paramLangDesc' => 'Язык конвертации. Допустимые значения:',
            'values' => ['russian' => 'Русский', 'english' => 'Английский', 'deutsch' => 'Немецкий'],
            'exampleRequest' => 'Пример запроса',
            'exampleResponse' => 'Пример ответа',
            'error' => 'Ошибки',
            'errorText' => 'Если параметры отсутствуют или некорректны, API вернёт JSON с сообщением об ошибке:',
            'notes' => 'Примечания',
            'notesList' => [
                'Параметры не чувствительны к регистру (можно использовать заглавные или строчные буквы).',
                'Число должно быть целым положительным числом.',
                'Ответ всегда приходит в формате JSON.'
            ]
        ];
    break;
}
?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="styles/style.css">
    <name>API</name>
  </head>
    <body>
    <div class="container">
    <h1 class="title"><?php echo $texts['title'];?></h1>
    <p class="pageText"><?php echo $texts['description'];?></p>
    <h2 class="subtitle"><?php echo $texts['method']?></h2>
    <p class="pageText"><?php echo $texts['parameters'];?></p>
    <div class="table__wrapper">
    <table>
        <thead>
            <tr>
                <th>Parameter</th>
                <th>Type</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $texts['paramInt']; ?></td>
                <td>integer</td>
                <td><?php echo $texts['paramIntDesc']; ?></td>
            </tr>
            <tr>
                <td><?php echo $texts['paramLang']; ?></td>
                <td>string</td>
                <td>
                    <?php echo $texts['paramLangDesc']; ?>
                    <ul>
                        <?php foreach($texts['values'] as $key => $value) {
                            echo "<li><p>$key</p> - $value</li>";
                        } ?>
                    </ul>
                </td>
            </tr>
        </tbody>    
    </table>
    </div>
<div class="examples">
    <div class="request">
        <h3><?php echo $texts['exampleRequest']; ?></h3>
        <p>GET api.php?int=2145&lang=deutsch</p>
    </div>
    <div class="answer">
        <h3><?php echo $texts['exampleResponse']; ?></h3>
        <p>{"result": "zweitausend einhundert fünfundvierzig"}</p>
    </div>
</div>
    <h2><?php echo $texts['error']; ?></h2>
    <p><?php echo $texts['errorText']; ?></p>
    <p>{"error": "Missing int or lang parameter"}</p>
<div class="notes">
    <h2><?php echo $texts['notes']; ?></h2>
    <ul>
        <?php foreach($texts['notesList'] as $note) {
            echo "<li>$note</li>";
        } ?>
    </ul>
</div>
</div>
</body>
</html>