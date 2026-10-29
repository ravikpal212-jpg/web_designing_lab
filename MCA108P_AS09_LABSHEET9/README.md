# Web Designing — Lab Sheet 9

Contains Q01–Q20 as separate files. `Q01.sql` creates the database and tables; `db.php` is the shared PDO connection.

## Run with XAMPP
1. Copy this folder into `C:\xampp\htdocs\`.
2. Import/run `Q01.sql` in phpMyAdmin.
3. Update `db.php` credentials if needed.
4. Open `http://localhost/MCA108P_AS09_LABSHEET9/Q02.php`.
5. Use the relevant Qxx.php file for each exercise.

## Notes
- Registration/login examples use the same `users` table and hashed passwords.
- Upload exercise creates an `uploads` directory. For production, store uploads outside the public web root.
- These are learning examples; add CSRF protection and stronger authorization before real deployment.
