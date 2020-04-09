## 导出相应的数据

SELECT CONCAT
('drop table  ' , table_name,';') 
FROM 
information_schema.tables 
WHERE 
table_schema LIKE '库名'
AND table_name LIKE '%表名%';

