# Backing Up

```
mysqldump -u username -p database_to_backup > backup_name.sql
```

# Restoring

We need to create a blank database to house the imported data. First, log into MySQL by typing:

```
mysql -u username -p
```

Create a new database which will hold all of the data from the data dump and then exit out of the MySQL prompt:

```
CREATE DATABASE database_name; exit
```

Next, we can redirect the dump file into our newly created database by issuing the following command:

```
mysql -u username -p database_name < backup_name.sql
```