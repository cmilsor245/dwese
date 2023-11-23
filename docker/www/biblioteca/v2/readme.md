código utilizado para crear la base de datos:

```sql
CREATE DATABASE bookstore_v2;

USE bookstore;

CREATE TABLE book (
  book_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title varchar(200) NOT NULL,
  genre varchar(50) NOT NULL,
  country varchar(20) NOT NULL,
  year_published varchar(4) NOT NULL,
  num_pages varchar(5) NOT NULL
);

CREATE TABLE author (
  author_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name varchar(20) NOT NULL,
  last_name varchar(200) NOT NULL
);

CREATE TABLE book_author (
  book_id int NOT NULL,
  author_id int NOT NULL
);
```