<?php
define('ROOT', dirname(__DIR__));
include 'configProject.php';
include 'views/header' . $phpExt;
include 'sidebar' . $phpExt;

$current_version = '1.5';
$current_lang = 'українська';
$current_release_date = '21-04-2023';
$check_version = 'https://inwebpress.com/versions/';

$stream_context = stream_context_create([
        "ssl" => [
            "verify_peer" => false,
            "verify_peer_name" => false
        ]
    ]);  
    
    $latest_version = file_get_contents("$check_version/redirect_version.txt", false, $stream_context); 
?>

<!---About System--->
<h4>Про систему</h4>

<p class="text-secondary">
    <?php if ($current_version < $latest_version) {
    echo "Поточна версія: $current_version <span class='new_version_number'>Доступна $latest_version</span>";
    } else {
        echo "Поточна версія: $current_version";
    }
    ?>
    <br>
    Мова: <?php echo $current_lang; ?><br>
</p>
<p class="text-secondary-support">
    Підтримка та оновлення: <a href="https://github.com/pekarskyi/RedirectMaster-UA" target="_blank">Mykola Pekarskyi</a>
</p>

<!---Check System--->
<?php
    $error = false;
    if (phpversion() < "7.4") {
        $error = true;
        $requirement1 = "<span class='label label-warning'>PHP " . phpversion() . "</span>";
    } else {
        $requirement1 = "<span class='label label-success'>v." . phpversion() . "</span>";
    }

    if (!extension_loaded('mysqli')) {
        $error = true;
        $requirement2 = "<span class='label label-warning'>Вимкнено</span>";
    } else {
        $requirement2 = "<span class='label label-success'>Увімкнено</span>";
    }

    if (!extension_loaded('openssl')) {
        $error = true;
        $requirement5 = "<span class='label label-warning'>Вимкнено</span>";
    } else {
        $requirement5 = "<span class='label label-success'>Увімкнено</span>";
    }

?>
    <div id="wrapper_server">
        <div id="loader">
            <span class="dot dot_1"></span>
            <span class="dot dot_2"></span>
            <span class="dot dot_3"></span>
            <span class="dot dot_4"></span>
        </div>
        <table class="table_server table-hover" id="requirements" style="display:none;">
            <thead>
                <tr>
                    <th>Вимоги</th>
                    <th>Результат</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>PHP 7.4+ </td>
                    <td><?php echo $requirement1; ?></td>
                </tr>
                <tr>
                    <td>Розширення MySQLi PHP</td>
                    <td><?php echo $requirement2; ?></td>
                </tr>
                <tr>
                    <td>Розширення OpenSSL PHP</td>
                    <td><?php echo $requirement5; ?></td>
                </tr>
            </tbody>
            
        </table>
    </div>
    <script>
        var loading = {
            complete: function () {
                var loading = document.getElementById("loader");
                loading.remove(loading);
            }
        };
        document.addEventListener("readystatechange", function () {
            if (document.readyState === "complete") {
                setTimeout(function(){
                    loading.complete();
                    var requirements = document.getElementById("requirements");
                    requirements.style['display'] = null;
                },3000);
            }
        });
    </script>

<!---Changelog--->
<p class="text-secondary">
    <b>Список змін:</b></p>

<p class="text-secondary-changelog">
    <?php 
        echo $current_version;
        echo "&nbsp;";
        echo "($current_release_date)"; 
    ?>
    <ul class="text-secondary-changelog">
        <li>Дрібні покращення в дизайні (шрифт, іконки, кнопки)</li>
        <li>Підтримка PHP 7.4 - 8.1</li>
        <li>Підтримка локального Web-сервера</li>
        <li>Виправлення помилок PHP</li>
        <li>Створення української версії скрипта</li>
        <li>Перевірка наявності нової версії (Про систему)</li>
		<li>Перевірка версії PHP і розширень (Про систему)</li>
    </ul>

</p>

<?php include 'views/footer' . $phpExt; ?>