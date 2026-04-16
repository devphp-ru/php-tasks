
--  1. Напишите запрос, чтобы найти имя, фамилию и зарплату сотрудников, у которых зарплата выше, чем у сотрудника, чье имя и фамилия = «Bull».

select first_name, last_name, salary from employees where salary > (select salary from employees where last_name='Bull');

-- 2. Напишите запрос, чтобы найти имя, фамилию всех сотрудников, которые работают в ИТ-отделе.

select first_name, last_name from employees where department_id in (select department_id from departments where department_id='IT');

-- 3. Напишите запрос, чтобы найти имя, фамилию сотрудников, которые менеджеры и работают в отделе в США.

select first_name, last_name from employees
                        where manager_id
                        in (select employee_id from employees where department_id
                        in (select department_id from departments where location_id
                        in (select location_id from locations where country_id='US')));

-- 4. Напишите запрос, чтобы найти имя, фамилию сотрудников, которые являются менеджерами.

select first_name, last_name from employees where (employee_id in (select manager_id from employess));

-- 5. Напишите запрос, чтобы найти имя, фамилию и зарплату сотрудников, зарплата которых превышает среднюю зарплату.

select first_name, last_name, salary from employees where salary > (select avg(salary) from employees);

-- 6. Напишите запрос, чтобы найти имя, фамилию и зарплату сотрудников, чья зарплата равна минимальной зарплате для их должности.

select first_name, last_name, salary from employees where employees.salary = (select min(salary) from jobs where employees.job_id=jobs.job_id);

-- 7. Напишите запрос, чтобы найти имя, фамилию и зарплату сотрудников, которые зарабатывают больше, чем средняя зарплата и работают в любом из ИТ-отделов.

select first_name, last_name, salary from employees
                    where department_id
                    in (select department_id from departments where department_name like 'IT%')
                    and salary > (select avg(salary) from employees);

-- 8. Напишите запрос, чтобы найти имя, фамилию и зарплату сотрудников, которые зарабатывают больше, чем зарабатывает мистер Белл.

select first_name, last_name, salary from employees where salary > (select salary from employees where last_name='Bell') order by first_name asc;

-- 9. Напишите запрос, чтобы найти имя, фамилию и зарплату сотрудников, которые получают ту же зарплату, что и минимальная зарплата для всех отделов.

select first_name, last_name, salary from employees where salary = (select min(salary) from employees);

-- 10. Напишите запрос, чтобы найти имя, фамилию и зарплату сотрудников, зарплата которых превышает среднюю зарплату всех отделов.

select first_name, last_name, salary from employees where salary > all (select avg(salary) from employees group by department_id);

-- 11. Напишите запрос, чтобы найти имя, фамилию и зарплату сотрудников, которые получают зарплату,
-- превышающую зарплату всех клерков доставки (job_id = 'sh_clerk').

select job_id, first_name, last_name, salary from employees where salary > all (select salary from employees where job_id='sh_clerk') order by salary desc;

-- 12. Напишите запрос, чтобы найти имя, фамилию сотрудников, которые не являются руководителями.

select e1.first_name, e1.last_name from employees e1 where not exists (select 'x' from employees e2 where e2.manager_id=e1.employee_id);

-- 13. Напишите запрос, чтобы отобразить идентификатор сотрудника, имя, фамилию и названия отделов всех сотрудников.

select employee_id, first_name, last_name, (select department_name from departments d where e.department_id=d.department_id) departemnt from employees e order by departemnt asc;

-- 14. Напишите запрос, чтобы найти пятую максимальную зарплату в таблице сотрудников.

select distinct salary from employees e1 where 5 = (select count(distinct salary) from employees e2 where e2.salary>=e1.salary);

-- 15. Напишите запрос, чтобы найти четвертую минимальную зарплату в таблице сотрудников.

select distinct salary from employees e1 where 4 = (select count(distinct salary) from employees e2 where e2.salary <= e1.salary);

-- 16. Напишите запрос, чтобы выбрать последние 10 записей из таблицы.

select * from (select * from employees order by employee_id desc limit 10) sub order by employee_id asc;

select * from employees order by employee_id desc limit 10;

-- 17. Напишите запрос с указанием идентификатора и названия всех отделов, в которых не работает ни один сотрудник.

select * from departments where department_id not in (select department_id from employees);

-- 18. Напишите запрос, чтобы получить 3 максимальные зарплаты.

select distinct salary from employees e1 where 3 >= (select count(distinct salary) from employees e2 where e2.salary >= e1.salary) order by e1.salary desc;

-- 19. Напишите запрос, чтобы получить 3 минимальные зарплаты.

select distinct salary from employees e1 where 3 >= (select count(distinct salary) from employees e2 where e2.salary <= e1.salary) order by e1.salary desc;

-- 20. Напишите запрос, чтобы получить максимальную зарплату сотрудников.

select * from employees e1 where (1) = (select count(distinct(e2.salary)) from employees e2 where e2.salary > e1.salary);
