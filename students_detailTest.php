use PHPUnit\Framework\TestCase;

class StudentsDetailTest extends TestCase
{
    public function testStudentDetailForm()
    {
        // Create a mock student object with sample data
        $student = new stdClass();
        $student->code = 'S001';
        $student->name = 'John Doe';
        $student->address = '123 Main St';
        $student->mobile = '1234567890';
        $student->email = 'johndoe@example.com';
        $student->gender = 'Male';
        $student->photo = 'photo.jpg';

        // Render the student detail form
        ob_start();
        include '/C:/xampp/htdocs/library_project/students_detail.php';
        $output = ob_get_clean();

        // Assert that the form contains the expected elements and data
        $this->assertStringContainsString('Student Code: S001', $output);
        $this->assertStringContainsString('Student Name: John Doe', $output);
        $this->assertStringContainsString('Address: 123 Main St', $output);
        $this->assertStringContainsString('Mobile Number: 1234567890', $output);
        $this->assertStringContainsString('Email: johndoe@example.com', $output);
        $this->assertStringContainsString('Gender: Male', $output);
        $this->assertStringContainsString('Photo: <img src="photo.jpg" alt="Student Photo">', $output);
    }
}