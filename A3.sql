GRANT ALL ON BANKS. * TO 'root'@'localhost';
DROP DATABASE BANKS;
CREATE DATABASE BANKS;
USE BANKS;


CREATE TABLE BANK(
Code INT NOT NULL ,
Name VARCHAR(20),
Addr VARCHAR(50),

PRIMARY KEY(Code)
);

CREATE TABLE BRANCH(
B_Code INT NOT NULL,
Branch_no INT NOT NULL,
Addr VARCHAR(50),

PRIMARY KEY (B_Code, Branch_no),
FOREIGN KEY (B_Code) REFERENCES BANK (Code)
);

CREATE TABLE ACCOUNT (
Acct_no INT NOT NULL,
Balance DECIMAL,
a_type VARCHAR(10),
a_branch INT NOT NULl,
Bank INT NOT NULL,

PRIMARY KEY  (Acct_no),
FOREIGN KEY  (a_branch)   REFERENCES  BRANCH  (Branch_no),
FOREIGN KEY  (Bank)     REFERENCES  BANK    (Code)
);

CREATE TABLE LOAN (
Loan_no INT NOT NULL,
Amount DECIMAL,
l_type VARCHAR(10),
l_branch INT NOT NULl,
Bank INT NOT NULL,

PRIMARY KEY  (Loan_no),
FOREIGN KEY  (l_branch)  REFERENCES   BRANCH  (Branch_no),
FOREIGN KEY  (Bank)    REFERENCES   BANK    (Code)
);


CREATE TABLE CUSTOMERS (
Acct_no      INT        NOT NULL,
Loan_no      INT        NOT NULL
Ssn          INT        NOT NULL,
Name         VARCHAR(20),
Addr         VARCHAR(50),
Phone        INT,

PRIMARY KEY  (Ssn),
FOREIGN KEY  (Acct_no)  REFERENCES  ACCOUNT (Acct_no),
FOREIGN KEY  (Loan_no)  REFERENCES  LOAN    (Loan_no)
);

INSERT INTO BANK VALUES
(1, 'BANK A', '1 Finance Street'),
(2, 'BANK B', '18 Finance Street'),
(3, 'BANK C', '221 Finance Street'),
(4, 'BANK D', '31 Finance Street'),
(5, 'BANK E', '12 Finance Street');

INSERT INTO BRANCH VALUES
(1,01,'12 Eaton Street'),
(1,02,'123 Eaton Street'),
(1,03,'312 Eaton Street'),
(2,01,'124 Eaton Street'),
(2,02,'42 Eaton Street');

INSERT INTO ACCOUNT VALUES
(123, 12.50, 'checking', 01, 1),
(456, 300.10, 'checking', 01, 1),
(678, 1000.00, 'savings', 03, 1),
(101, 10.34, 'checking', 02, 1),
(333, 212.02, 'checking', 02, 2);

INSERT INTO LOAN VALUES
(123, 12.50, 'mortgage', 01, 1),
(456, 300.10, 'mortgage', 01, 1),
(678, 1000.00, 'corporate', 03, 1),
(101, 10.34, 'mortgage', 02, 1),
(333, 212.02, 'mortgage', 02, 2);

INSERT INTO CUSTOMERS VALUES
(123,123, 000112222, 'Jon Smith', 5551234576),
(456, 456, 111223333, 'Jack Black', 5559876543),
(678, 678, 222334444, 'Jessica Rabbit', 5551123344),
(101,101, 333445555, 'Ian Blue', 5554558624),
(333, 333, 999887777, 'Nate, Lazo', 5552336855);

DESCRIBE BANK;
SELECT *
FROM BANK;

DESCRIBE BRANCH;
SELECT *
FROM BRANCH;

DESCRIBE ACCOUNT;
SELECT *
FROM ACCOUNT;

DESCRIBE LOAN;
SELECT *
FROM LOAN;

DESCRIBE CUSTOMERS;
SELECT *
FROM CUSTOMERS;

SELECT Name
FROM BANK;

SELECT B.Name,R.B_Code
FROM BANK B, BRANCH R
WHERE B.Code=R.B_Code;

SELECT Name
FROM CUSTOMERS;

SELECT C.NAME, C.Acct_no
FROM CUSTOMER C;

SELECT C.NAME B.Addr
FROM CUSTOMERS C, LOAN L, BRANCH B
WHERE C.Loan_no=L.Loan_no, L.l_branch=B.Branch_no;
