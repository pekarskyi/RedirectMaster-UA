# Redirect Master UA

Редирект-Майстер – свій скорочувач посилань для партнерського маркетингу.

Редирект-Майстер – це зручний скорочувач посилань у вигляді скрипта PHP, який встановлюється на Ваш власний домен і дає змогу керувати всіма вашими посиланнями в одному місці та бачити статистику переходів.

- :floppy_disk: Версія: 1.5 [Завантажити](https://github.com/pekarskyi/RedirectMaster-UA/releases)
- :earth_africa: Мова: українська
- :coffee: [Передісторія](https://github.com/pekarskyi/RedirectMaster-UA/wiki/%D0%9F%D0%B5%D1%80%D0%B5%D0%B4%D1%96%D1%81%D1%82%D0%BE%D1%80%D1%96%D1%8F)
- :scroll: [Опис, відео](https://inwebpress.com/uk/redirect-master/)
- :question: [FAQ](https://github.com/pekarskyi/RedirectMaster-UA/wiki/FAQ)
- :interrobang: [Поставити запитання / повідомити про проблему](https://github.com/pekarskyi/RedirectMaster-UA/issues)

## :framed_picture: Screenshots

- [Головна](https://1drv.ms/i/s!AqqMd7ixtOxl8TLLQtbj4Fa6mSUJ?e=FnZaEW)
- [Створення посилання](https://1drv.ms/i/s!AqqMd7ixtOxl8TRGx23KBFWIh7re?e=8tMKYX)
- [Статистика переходів по посиланню](https://1drv.ms/i/s!AqqMd7ixtOxl8Tg71SIVwOiX_Rut?e=FZoi0P)
- [Користувачі](https://1drv.ms/i/s!AqqMd7ixtOxl8TbGjug-z6Xh3joa?e=piWd6q)
- [Налаштування](https://1drv.ms/i/s!AqqMd7ixtOxl8TVFJGdWQ2UpoODK?e=pl7qNO)
- [Про систему](https://1drv.ms/i/s!AqqMd7ixtOxl8TdXK2JSlnm8bdwe?e=fVQx7N)
- [Авторизація](https://1drv.ms/i/s!AqqMd7ixtOxl8TFLLtKE0DIc1Fjt?e=NjkXGg)
- [Відновлення паролю](https://1drv.ms/i/s!AqqMd7ixtOxl8TPX787N8CM729Fk?e=534Sa1)

## :earth_africa: Languages

- [Українська](https://github.com/pekarskyi/RedirectMaster-UA)
- [Російська](https://github.com/pekarskyi/RedirectMaster)

## :loudspeaker: Requirements

Скрипт невибагливий до ресурсів хостингу і не створює навантаження на сервер. Можна встановити на домен, піддомен чи в підпапку.

- PHP: 7.4+ (рекомендую 8.0+)
- Secure connection (HTTPS) - підключаємо SSL-сертифікат, щоб сайт працював на захищеному протоколі.
- MySQL

## :white_check_mark: Install

1. Завантажуємо скрипт. Розпаковуємо архів на комп'ютері.
2. Купуємо домен із коротким ім'ям і хостинг (можна дешевий).
3. У корінь нашого сайту завантажуємо папки і файли скрипта.
4. На хостингу створюємо Базу даних та імпортуємо дамп (файл db.sql). Примітка: після встановлення, цей файл на сайті можна видалити.
5. Відкриваємо на сайті файл: /admin/MySQLlib/dbAccess.php і прописуємо в ньому дані підключення до Бази даних.
6. У файлі /inc/config.php<br>
у рядках 28 і 31 необхідно прописати свій домен і сайт.
7. Заходимо в адмінку сайту за адресою:
```
https://mysite.com/admin/
Email: admin@mysite.com
Пароль: Qwerty123456
```
8. В адмінці, в розділі "Користувачі", для облікового запису адміна міняємо пошту і пароль.
9. У розділі "Налаштування" вказуємо url-адресу, на яку користувач буде перенаправлений у разі, якщо він введе адресу домену.<br>
Ви можете вказати будь-яке своє партнерське посилання. Є люди, які цікавляться, а що там на головній. Ось і відправляйте їх на свої реферальні посилання. Або створіть файл HTML і в ньому розмістіть рекламні банери. Посилання на цей файл вкажіть як редирект.

## :ballot_box_with_check: Update

1. Зробіть резервну копію папки скрипта на сервері.
2. Збережіть окремо такі файли: 
```
/admin/MySQLlib/dbAccess.php
/inc/config.php
```
3. Завантажте вміст із папки з новою версією на сервер у папку скрипта - замініть папки та файли.
4. Завантажте на сервер свої файли dbAccess.php і config.php.
5. Перевірте роботу скрипта.

## :rocket: Roadmap

Послідовність появи нових змін може бути іншою, ніж зазначено нижче.

- [X] Зробити скрипт доступним і безкоштовним
- [X] Поліпшення зовнішнього вигляду (шрифт, іконки, кнопки)
- [X] Перевірка наявності нової версії
- [X] Виправлення помилок PHP
- [X] Підтримка PHP 7.4 і вище
- [X] Підтримка локального веб-сервера
- [X] Створення україномовної версії скрипта (як окремий проект)
- [ ] Створення англомовної версії скрипта (як окремий проект)
- [ ] Покроковий інсталятор

## :date: Changelog

```txt
1.4 (2019) - основна версія, російська мова. Підтримка PHP 7.3.

1.5 (21-04-2023):

- Дрібні покращення в дизайні (шрифт, іконки, кнопки)
- Підтримка PHP 7.0 - 8.1
- Підтримка локального Web-сервера
- Виправлення помилок PHP
- Створення української версії скрипта
- Перевірка наявності нової версії (Про систему)
- Перевірка версії PHP і розширень (Про систему)
```

## :hearts: Donate

Ви можете підтримати мене як розробника і пожертвувати на розвиток проєкту.

- [Донателло в UAH](https://donatello.to/inwebpress)
- [Банка від Монобанку в UAH](https://send.monobank.ua/jar/A6cy9eBtcB)

[![Stand With Ukraine](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/badges/StandWithUkraine.svg)](https://sitex.me/standwithukraine)