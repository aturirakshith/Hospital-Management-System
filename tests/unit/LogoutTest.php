<?php
use PHPUnit\Framework\TestCase;

class LogoutTest extends TestCase {
    public function testSessionDestroyedAndMessageDisplayed() {
        // Start output buffering 
        ob_start();

        require_once 'logout1.php'; 

        // Get the captured output
        $output = ob_get_clean();

        // Check if session is destroyed
        $this->assertEmpty($_SESSION, 'Session should be empty after destroying');

        // Check if the expected message is echoed
        $this->assertStringContainsString('You have logged out.', $output, 'Expected message not found');
    }
}
