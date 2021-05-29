const connection = require('../config/database').DB;
connection.connect();
class Student {
	get_student_by_email(email, callback) {
		connection.query('SELECT * FROM users WHERE email = ?', [email], function (err, rows, fields) {
			callback(err, rows);
		});
	}
	register_student(user) {
		$query = 'INSERT INTO students (first_name, last_name, email, password, created_at) VALUES (?,?,?,?,?)';
		$values = array($user['first_name'], $user['last_name'], $user['email'], $user['password'], $user['created_at']);
		// return $this->db->query($query, $values);
	}
}
module.exports = Student;
