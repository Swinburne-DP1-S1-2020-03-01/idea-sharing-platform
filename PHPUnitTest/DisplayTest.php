
<?php
use PHPUnit\Framework\TestCase;

require 'Client/utils.php';
class DisplayTest extends TestCase
{
    public function testDisplayAuthor()
    {
        $this->assertEquals("John", DisplayAuthor("John", "john@gmail.com"));
        $this->assertEquals("john@gmail.com", DisplayAuthor("", "john@gmail.com"));
        $this->assertEquals("akira", DisplayAuthor("akira", null));
        $this->assertEquals("tommy@mail.com", DisplayAuthor(null, "tommy@mail.com"));
    }

    public function testDisplayArticlePreview() 
    {
        $word_limit = 20;
        $this->assertEquals("Hello World", DisplayArticlePreview("Hello World", $word_limit));

        $word_limit = 10;
        $this->assertEquals("Hello Worl...", DisplayArticlePreview("Hello World", $word_limit));

        $word_limit = 1;
        $this->assertEquals("H...", DisplayArticlePreview("Hello World", $word_limit));

        $word_limit = 1;
        $this->assertEquals("A", DisplayArticlePreview("A", $word_limit));

        $word_limit = 0;
        $this->assertEquals("", DisplayArticlePreview("", $word_limit));
    }

    public function testDisplayDraftMessage()
    {
        $this->assertEquals("Not published", DisplayDraftMessage(1));
        $this->assertEquals("Published", DisplayDraftMessage(0));
    }
}