# How to run this project

```
git clone https://github.com/tqt97/school-management-system.git
cd school-management-system
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
```

> import B'class.postman_collection.json to ***postman** to test api


### API list

- Get All score of student: <http://127.0.0.1:8000/api/v1/student/{id}/exams>
- Update exam score: <http://127.0.0.1:8000/api/v1/exam/{id}>
<br>
- Get student history: <http://127.0.0.1:8000/history/{id}>
- Get best student 1: <http://127.0.0.1:8000/getBestStudent1>
- Get best student 2: <http://127.0.0.1:8000/getBestStudent2>
- Get best student 3: <http://127.0.0.1:8000/getBestStudent3>

### Relationship in DB

- School has many student
- School has many teacher
- School has one principal
<br>
- Principal belong to School
<br>
- Exam belong to Student
- Exam belong to Subject
<br>
- Student has many Exam
- Student has many Subject
- Student belong to School
<br>
- Subject belong to Teacher
- Subject has many Student
- Subject has many Exam
<br>
- Teacher belong to School
- Teacher has one Subject
