
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
