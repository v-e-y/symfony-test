# Installation
- Open terminal and write commands:
```
cmd: git clone https://github.com/v-e-y/symfony-test.git .
cmd: composer install
cmd: docker-compose up -d --build
cmd: docker container exec -it symfony-test-php-1 /bin/bash
cmd: bin/console doctrine:migrations:migrate
cmd: bin/console doctrine:fixtures:load
```
- In browser open http://localhost/

## Results

![Home page](/results/homepage.png "Home page")
![Home page](/results/addUser.png "Add user page")
![Home page](/results/addUserToProducts.png "Add User to Products")
![Home page](/results/listOfUsersAndHisProducts.png "list of Users and his Products")

---  
Тестовое задани:  
Необходимо создать проект на фреймворке Symfony.
Создать две формы:
1. Добавление юзера, поля (firstName, lastName, age).
2. Добавление юзерам продуктов, селектор с выбором юзера и поле с название продукта, у одного юзера может быть много продуктов.

Все это необходимо вывести на 3 страницах:
1. На одной форма добавление юзера.
2. На второй форма с добавлением продуктов юзеру.
3. На третьей список юзеров и продуктов у них.

Визуальная составляющая на вашей стороне, по желанию можете подключить бутстрап.

Данный проект необходимо будет залить на gitlab и предоставить ссылку на репозиторий.

Срок сдачи 3 дня