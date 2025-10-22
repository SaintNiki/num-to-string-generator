<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Num to string</title>
    <link rel="stylesheet" href="styles/style.css">
  </head>

<?php
require_once 'autoload.php';

use Converter\Converter;
use Validator\Validator;



$header = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'en';
$lang = strtolower(substr($header, 0, 2));
switch($lang) 
{
    case 'ru':
        $notice = '<h1>Введите любое число и получите его в строковом представлении</h1>';
        $langNotice = 'Выберите язык';
        $submit = 'ГЕНЕРИРОВАТЬ';
    break;
    case 'en':
        $notice = '<p>Enter any number and get its string representation</p>';
        $langNotice = 'Select language';
        $submit = 'GENERATE';
    break;
    case 'de':
        $notice = '<p>Geben Sie eine beliebige Zahl ein und erhalten Sie ihre Zeichenfolgendarstellung</p>';
        $langNotice = 'Sprache auswählen';
        $submit = 'ERZEUGEN';
    break;
    default:
        $notice = '<p>Enter any number and get its string representation</p>';
        $langNotice = 'Select language';
        $submit = 'Generate';
}


if(!empty($_POST))
{
    $error = '';
    $input = $_POST['num'];
    $language = $_POST['language'];
    
    $validator = new Validator();
    $clean = $validator->validate($input, $language);

    if(is_string($clean))
    {
        $error = $clean;
    } else {
        $converter = new Converter($language);

        $result = $converter->convertString($clean);
    }


}
?>
<body>
<div class="container">
<form action="" method="POST">
    <div class="form__text"><?php echo !empty($_POST) && !empty($error) ? $error : $notice ;?></div>
    <div class="int__input">
        <input type="text" name="num" value="<?php echo !empty($_POST['num']) ? $_POST['num'] : '' ;?>">
    </div>
    <div class="select__language">
        <label for="language"><?php echo !empty($langNotice) ? $langNotice : '' ;?></label>
        <select name="language" id="language">
            <option value="russian" <?php echo (!empty($_POST['language']) && $_POST['language'] === 'russian') ? 'selected' : '';?>>Русский</option>
            <option value="english" <?php echo (!empty($_POST['language']) && $_POST['language'] === 'english') ? 'selected' : '';?>>English</option>
            <option value="deutsch" <?php echo (!empty($_POST['language']) && $_POST['language'] === 'deutsch') ? 'selected' : '';?>>Deutsch</option>
        </select>
    </div>

    <input class="submit" type="submit" value="<?php echo $submit; ?>">

    <div class="form__result">
        <h3><?php echo !empty($result) ? $result : ''; ?></h3>
    </div>

    <div class="link_wrapper">
        <a href="api.php">API</a>
    </div>
</form>
</div>
</body>
</html>


