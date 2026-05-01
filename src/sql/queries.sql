
# Выбрать и перечислить названия городов, где живут авторы.
select city from authors;

# Выбрать и перечислить имена и фамилии авторов, а также названия штатов и городов.
select au_fname, au_lname, city, state from authors;

# Выбрать и перечислить все столбцы таблицы authors.
select * from authors;

# Получить город, штат и страну каждого издателя.
select city, state, country from publishers;

#  Ключевое слово AS обозначает произвольный псевдоним любого столбца для отображения результатов.
select au_fname as 'First name', au_lname as 'Last name', city as City, state, zip as 'Postal code' from authors;

# Перечислить штаты, где живут авторы.
select state from authors;

# Перечислить различные штаты, в которых живут авторы, без дубликатов.
select distinct state from authors;

# Перечислить города и штаты, в которых живут авторы.
select city, state from authors;

# Перечислить различные пары (город, штат), чтобы адрес каждого автора, занесенного в нашу базу, содержал такую пару в качестве элемента.
select distinct city, state from authors;

# SELECT columns FROM table ORDER BY sort_column [ASC | DESC];

# Перечислить имена, фамилии, города и штаты проживания авторов,
# по алфавиту (этот порядок совпадает с порядком по умолчанию, что делает опцию ASC практически ненужной).
select au_fname, au_lname, city, state from authors order by au_lname asc;

# Перечислить имена, фамилии, города и штаты проживания авторов в обратном алфавитном порядке.
select au_fname, au_lname, city, state from authors order by au_fname desc;

# Перечислить имена, фамилии, города и штаты проживания авторов, по убыванию городов внутри восходящего порядка штатов.
select au_fname, au_lname, city, state from authors order by state asc, city desc;

# Перечислить имена, фамилии, города и штаты проживания авторов, так, чтобы результат
# был сначала отсортирован в восходящем (алфавитном) порядке по столбцу штата (столбец 4 в предложении SELECT),
# а потом в нисходящем (обратном алфавитном) порядке по столбцу фамилии (столбец 2 в предложении SELECT).
select au_fname, au_lname, city, state from authors order by 4 asc, 2 desc;

# Значения null, находящиеся в столбце, по которому проводится сортировка, будут перечислины или самыми первыми, или самыми последними.
select pub_id, state, country from publishers order by state asc;

# Столбец почтового индекса (zip) не входит в состав столбцов, которые надо выбрать.
select city, state from authors order by zip asc;

# Использовать в предложении order by не имена столбцов, а их псевдонимы.
select au_fname as 'First name', au_lname as 'Last name', state from authors order by state asc, 'Last name' asc, 'First name' asc;

# Выполнить сортировку по выражению.
select title_id, price, sales, price * sales as Revenue from titles order by Revenue desc;

# Фильтрация строк с помощью предложения WHERE

# SELECT columns FROM table WHERE test_column op value;

# Типы условий
# Сравнение =, <>, <, <=, >, >=
# Сопоставление с образцом LIKE
# Фильтрация диапазона BETWEEN
# Фильтрация списка IN
# Проверка на значение null IS NULL

# Получить список авторов, чтобы фамилия каждого из них отличалась от Hull.
select au_id, au_fname, au_lname from authors where au_lname <> 'Hull';

# Получить список названия из книг, для которых контракт не подписан.
select title_name, contract from titles where contract = 0;

# Получить названия книг, выпущенных не ранее 2001 года.
select title_name, pubdate from titles where pubdate >= date '2001-01-01';

# Получить названия книг, валовая прибыль от продажи которых составила более миллиона рублей.
select title_name, price * sales as Revenue from titles where price * sales > 1000000;

# Комбинорование условий с помощью операторов AND, OR и NOT

# Получить названия книг-биографий, которые продаются дешевле 20 руб. за каждую.
select title_name, type, price from titles where type = 'biography' and price < 20;

# Получить имена, фамилии и штаты проживания авторов, чьи фамилии начинаются с H-Z.
select au_fname, au_lname, state from authors where au_lname >= 'H' and au_lname <= 'Zz' and state <> 'CA';

# Получить имена, фамилии авторов, которые живут или в штате Нью-Йорк, или в штате Колорадо. или в городе Сан-Франциско.
select au_fname, au_lname, city, state from authors where (state = 'NY') or (state = 'CO') or (city = 'San Francisco');

# Получить идентификаторы, названия, штаты и страны тех издательств, которые находятся в штате Калифорния,
# или не находятся в штате Калифорния.
select pub_id, pub_name, state, country from publishers where (state = 'CA') or (state <> 'CA');

# Получить имена, фамилии авторов, которые не живут в Калифорнии.
select au_fname, au_lname, state from authors where not (state = 'CA');

# Получить названия книг, цена которых не ниже 20 руб. и объем продаж которых превышает 15 000 копий.
select title_name, sales, price from titles where not (price < 20) and (sales > 15000);
select title_name, sales, price from titles where price > 20 and sales > 15000;

# Получить книги историю, или биографию и цена которых ниже 20 руб.
# (Запрос работает не сработает, т.к. оператор AND выполнится раньше оператора OR)
select title_id, type, price from titles where type = 'history' or type = 'biography' and price < 20;
# (Выполняем оперетор OR раньше оператора AND)
select title_id, type, price from titles where (type = 'history' or type = 'biography') and price < 20;

# Сравнение по шаблону оператором LIKE

# SELECT columns FROM table WHERE test_column [NOT] LIKE 'pattern';

# Получить имена и фамилии авторов, чьи фамилии начинаются на Kel.
select au_fname, au_lname from authors where au_lname like 'Kel%';

# Получить имена и фамилии авторов, в фамилиях которых на местах 3-го и 4-го знаков есть буква 'l'.
select au_fname, au_lname from authors where au_lname like '__ll%';

# Получить имена и фамилии авторов, город, штат, код которые живут в районе залива Сан-Франциско (индекс начинается с цифр 94...).
select au_fname, au_lname, city, state, zip from authors where zip like '94___';

# Получить авторов, живущих за пределами территориальной области, которая соответствует телефонным кодам 212, 415 и 303.
select au_fname, au_lname, phone from authors where phone not like '212-___-____' and phone not like '415-___-%' and phone not like '303-%';

# Получить книги, которые содержат знак процентов в названии.
select title_name from titles where title_name like '%!%%' escape '!';

# Сравнение с диапазоном с помощью оператора BETWEEN

# SELECT columns FROM table WHERE test_column [NOT] BETWEEN low_value AND high_value;

# Получить авторов, у которых почтовый индекс не попадает в интервал от 20 000 до 89 999.
select au_fname, au_lname, zip from authors where zip not between 20000 and 89999;

# Получить названия книг, цена которых от 10 до 19,95 включительно.
select title_id, title_name, price from titles where price between 10 and 19.95;

# Получить названия книг, которые вышли из печати в 2000 году.
select title_id, title_name, pubdate from titles where pubdate between date '2000-01-01' and date '2000-12-31';

# Получить названия книг, цена которых от 10 до 19,95.
select title_id, title_name, pubdate from titles where (price > 10) and (price < 19.95);

# Фильтрация с помощью оператора IN

# SELECT columns FROM table WHERE test_column [NOT] IN (value1, value2, …);

# Получить авторов, которые живут не в штате Нью-Йорк не в штате Нью-Джерси, не в штате Калифорния.
select au_fname, au_lname, state from authors where state not in ('NY', 'NJ', 'CA');

# Получить названия книг, за которые аванс, выплаченный автору каждой книги, составил или 0, или 1000, или 5000 руб.
select title_id, advance from royalties where advance in (0.00, 1000.00, 5000.00);

# Получить названия (точнее, однозначные идентификаторы и даты публикации) книг, опубликованных 1 января 2000, 2001 и 2002 годов.
select title_id, pubdate from titles where pubdate in (date '2000-01-01', date '2001-01-01', date '2002-01-01');

# Проверка на значение NULL с помощью оператора IS [ NOT ] NULL

# Получить места нахождения всех издателей.
select pub_id, city, state, country from publishers;

# Получить идентификаторы и адреса издателей, которые находятся в штате Калифорния.
select pub_id, city, state, country from publishers where state = 'CA';

# Перечислить всех издателей, которые находятся вне штата Калифорния.
select pub_id, city, state, country from publishers where state <> 'CA' or state is null;

# Выбрать книги-биографии, даты публикации (прошлые и будущие) которых известны.
select title_id, type, pubdate from titles where type = 'biography' and pubdate is not null;

# Создание производных столбцов

# Здесь представлено одно выражение с константами в предложении SELECT.
select 2 + 3;

# Получить один столбец и одно выражение с константами.
select au_id, 2 + 3 from authors;

# Получить идентификаторы книг вместе с ценами, сниженными на 10%.
select title_id, price, 0.10 as Discount, price * (1 - 0.10) as 'New price' from titles;

# Арифметические операции

# -expr - Инвертирует знак числового выражения
# +expr - Оставляет знак числового выражения без изменения
# expr1 + expr2 - Суммирует два числовых выражения
# expr1 - expr2 - Вычитает из одного числового выражения другое числовое выражение
# expr1 * expr2 - Перемножает два числовых выражения
# expr1 / expr2 - Делит одно числовое выражение на другое числовое выражение

# Изменить знак числа с помощью оператора отрицания.
select title_id, -advance as Advance from royalties;

# Получить идентификаторы книг, которые являются биографиями, в порядке убывания дохода от продаж
# (доход от продажи есть число проданных копий, умноженное на цену одной копии).
select title_id, price * sales as Revenue from titles where type = 'biography' order by price * sales desc;

# Получить станицы книг делением столбца pages.
select title_id, pages / 10 as 'pages/10', pages / 10.0 as 'pages/10.0' from titles;

# Применение круглых скобок для переопределения правила ассоциативности.
select 2 + 3 * 4 as '2+3*4', (2 + 3) * 4 as '(2+3)*4', 6 / 2 * 3 as '6/2*3', 6 / (2 * 3) as '6/(2*3';

# Объединение строк с помощью оператора || (CONCAT)

# Получить имена и фамилии авторов, объедененные в один производный столбец, отсортировать в алфавитном порядке.
select concat(au_fname, ' ', au_lname) as 'Author name' from authors order by au_lname asc, au_fname asc;

# Получить в проядке убывания объемы продаж (количество когда-либо проданных копий) книг-биографий.
select concat(cast(sales as char(7)), ' проданные экземпляры книг ', title_id) as 'Biography sales' from titles where type = 'biography' and sales is not null order by sales desc;

# Получить в проядке убывания даты публикации книг.
select concat('Title ', title_id, ' published on ', cast(pubdate as char(10))) as 'Biography publication dates' from titles where type = 'biography' and pubdate is not null order by pubdate desc;

# Получить всех авторов, чье полное имя Klee Hull.
select au_id, au_fname, au_lname from authors where concat(au_fname, ' ', au_lname) = 'Klee Hull';

# Выбор произвольной подстроки с помощью функции SUBSTRING

# Разбить идентификаторы издателей, на буквенную и цифровую составляющие.
select pub_id, substring(pub_id from 1 for 1) as 'Alpha part', substring(pub_id from 2) as 'Num part' from publishers;

# Получить первую букву (инициал) имени, точку, пробел и фамилию всех авторов, живущих в штате Нью-Йорк, или штате Колорадо.
select concat(substring(au_fname from 1 for 1), '. ', au_lname) as 'Author name', state from authors where state in ('NY', 'CO');

# Получить имена и фамилии авторов, у которых телефонный номер начинается на 415.
select au_fname, au_lname, phone from authors where substring(phone from 1 for 3) = 415;
