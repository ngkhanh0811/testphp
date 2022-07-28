create table Student(
                        stuID int,
                        stuName varchar(55),
                        stuDay varchar(55),
                        address varchar(55),
                        classID varchar(55),
                        primary key (stuID)
) engine = InnoDB default char set = utf8 auto_increment=5;

insert into Student values(1, 'Nguyen Khanh', '08/11/2003', 'Ha Noi', 'T2109M'),
                          (2, 'Dinh Quang Anh', '02/04/1999', 'Ninh Binh', 'T2109M'),
                          (3, 'Hoang Luong', '08/03/2003', 'Ha Long', 'T2109M'),
                          (4, 'Manh Kien', '27/07/2003', 'Bac Giang', 'T2109M'),
                          (5, 'Ta Van Minh', '20/11/2003', 'Thanh Hoa', 'T2109M');
