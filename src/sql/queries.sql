
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

