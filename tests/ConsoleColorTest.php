<?php
namespace PHP_Parallel_Lint\PhpConsoleColor\Test;

use PHP_Parallel_Lint\PhpConsoleColor\ConsoleColor;
use PHP_Parallel_Lint\PhpConsoleColor\Test\Fixtures\ConsoleColorWithForceSupport;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \PHP_Parallel_Lint\PhpConsoleColor\ConsoleColor
 * @covers ::__construct
 */
class ConsoleColorTest extends TestCase
{
    /** @var ConsoleColorWithForceSupport */
    private $uut;

    /**
     * @before
     */
    protected function setUpConsoleColor()
    {
        $this->uut = new ConsoleColorWithForceSupport();
    }

    /**
     * @covers ::apply
     */
    public function testNone()
    {
        $output = $this->uut->apply('none', 'text');
        $this->assertSame("text", $output);
    }

    /**
     * @covers ::apply
     * @covers ::escSequence
     */
    public function testBold()
    {
        $output = $this->uut->apply('bold', 'text');
        $this->assertSame("\033[1mtext\033[0m", $output);
    }

    /**
     * @covers ::apply
     */
    public function testBoldColorsAreNotSupported()
    {
        $this->uut->setIsSupported(false);

        $output = $this->uut->apply('bold', 'text');
        $this->assertSame("text", $output);
    }

    /**
     * @covers ::apply
     * @covers ::setForceStyle
     */
    public function testBoldColorsAreNotSupportedButAreForced()
    {
        $this->uut->setIsSupported(false);
        $this->uut->setForceStyle(true);

        $output = $this->uut->apply('bold', 'text');
        $this->assertSame("\033[1mtext\033[0m", $output);
    }

    /**
     * @covers ::apply
     * @covers ::escSequence
     */
    public function testDark()
    {
        $output = $this->uut->apply('dark', 'text');
        $this->assertSame("\033[2mtext\033[0m", $output);
    }

    /**
     * @covers ::apply
     * @covers ::escSequence
     */
    public function testBoldAndDark()
    {
        $output = $this->uut->apply(array('bold', 'dark'), 'text');
        $this->assertSame("\033[1;2mtext\033[0m", $output);
    }

    /**
     * @covers ::apply
     * @covers ::styleSequence
     * @covers ::escSequence
     */
    public function test256ColorForeground()
    {
        $output = $this->uut->apply('color_255', 'text');
        $this->assertSame("\033[38;5;255mtext\033[0m", $output);
    }

    /**
     * @covers ::apply
     * @covers ::styleSequence
     */
    public function test256ColorWithoutSupport()
    {
        $this->uut->setAre256ColorsSupported(false);

        $output = $this->uut->apply('color_255', 'text');
        $this->assertSame("text", $output);
    }

    /**
     * @covers ::apply
     * @covers ::styleSequence
     * @covers ::escSequence
     */
    public function test256ColorBackground()
    {
        $output = $this->uut->apply('bg_color_255', 'text');
        $this->assertSame("\033[48;5;255mtext\033[0m", $output);
    }

    /**
     * @covers ::apply
     * @covers ::styleSequence
     * @covers ::escSequence
     */
    public function test256ColorForegroundAndBackground()
    {
        $output = $this->uut->apply(array('color_200', 'bg_color_255'), 'text');
        $this->assertSame("\033[38;5;200;48;5;255mtext\033[0m", $output);
    }

    /**
     * @covers ::setThemes
     * @covers ::themeSequence
     */
    public function testSetOwnTheme()
    {
        $this->uut->setThemes(array('bold_dark' => array('bold', 'dark')));
        $output = $this->uut->apply(array('bold_dark'), 'text');
        $this->assertSame("\033[1;2mtext\033[0m", $output);
    }

    /**
     * @covers ::addTheme
     * @covers ::themeSequence
     */
    public function testAddOwnTheme()
    {
        $this->uut->addTheme('bold_own', 'bold');
        $output = $this->uut->apply(array('bold_own'), 'text');
        $this->assertSame("\033[1mtext\033[0m", $output);
    }

    /**
     * @covers ::apply
     * @covers ::addTheme
     * @covers ::themeSequence
     */
    public function testAddOwnThemeArray()
    {
        $this->uut->addTheme('bold_dark', array('bold', 'dark'));
        $output = $this->uut->apply(array('bold_dark'), 'text');
        $this->assertSame("\033[1;2mtext\033[0m", $output);
    }

    /**
     * @covers ::addTheme
     */
    public function testAddOwnThemeInvalidInput()
    {
        $this->exceptionHelper('\InvalidArgumentException', 'Style must be string or array.');

        $this->uut->addTheme('invalid', new \ArrayIterator(array('bold', 'dark')));
    }

    /**
     * @covers ::apply
     * @covers ::addTheme
     * @covers ::themeSequence
     * @covers ::styleSequence
     * @covers ::isValidStyle
     */
    public function testOwnWithStyle()
    {
        $this->uut->addTheme('bold_dark', array('bold', 'dark'));
        $output = $this->uut->apply(array('bold_dark', 'italic'), 'text');
        $this->assertSame("\033[1;2;3mtext\033[0m", $output);
    }

    /**
     * @covers ::getThemes
     */
    public function testGetThemes()
    {
        $this->assertSame(array(), $this->uut->getThemes());

        $this->uut->addTheme('bold_dark', array('bold', 'dark'));
        $this->uut->addTheme('dark_italic', array('dark', 'italic'));

        $themes = $this->uut->getThemes();
        if (\method_exists($this, 'assertIsArray')) {
            // PHPUnit 7.5+.
            $this->assertIsArray($themes);
        } else {
            // PHPUnit < 7.5.
            $this->assertInternalType('array', $themes);
        }

        $this->assertCount(2, $themes);
    }

    /**
     * @covers ::hasTheme
     * @covers ::removeTheme
     */
    public function testHasAndRemoveTheme()
    {
        $this->assertFalse($this->uut->hasTheme('bold_dark'));

        $this->uut->addTheme('bold_dark', array('bold', 'dark'));
        $this->assertTrue($this->uut->hasTheme('bold_dark'));

        $this->uut->removeTheme('bold_dark');
        $this->assertFalse($this->uut->hasTheme('bold_dark'));
    }

    /**
     * @covers ::apply
     */
    public function testApplyInvalidArgument()
    {
        $this->exceptionHelper('\InvalidArgumentException');
        $this->uut->apply(new \stdClass(), 'text');
    }

    /**
     * @covers ::apply
     * @covers \PHP_Parallel_Lint\PhpConsoleColor\InvalidStyleException
     */
    public function testApplyInvalidStyleName()
    {
        $this->exceptionHelper('\PHP_Parallel_Lint\PhpConsoleColor\InvalidStyleException');
        $this->uut->apply('invalid', 'text');
    }

    /**
     * @covers ::apply
     * @covers \PHP_Parallel_Lint\PhpConsoleColor\InvalidStyleException
     */
    public function testApplyInvalid256Color()
    {
        $this->exceptionHelper('\PHP_Parallel_Lint\PhpConsoleColor\InvalidStyleException');
        $this->uut->apply('color_2134', 'text');
    }

    /**
     * @covers ::addTheme
     * @covers ::isValidStyle
     * @covers \PHP_Parallel_Lint\PhpConsoleColor\InvalidStyleException
     */
    public function testThemeInvalidStyle()
    {
        $this->exceptionHelper('\PHP_Parallel_Lint\PhpConsoleColor\InvalidStyleException');
        $this->uut->addTheme('invalid', array('invalid'));
    }

    /**
     * @covers ::setForceStyle
     * @covers ::isStyleForced
     */
    public function testForceStyle()
    {
        $this->assertFalse($this->uut->isStyleForced());
        $this->uut->setForceStyle(true);
        $this->assertTrue($this->uut->isStyleForced());
    }

    /**
     * @covers ::getPossibleStyles
     */
    public function testGetPossibleStyles()
    {
        if (\method_exists($this, 'assertIsArray')) {
            // PHPUnit 7.5+.
            $this->assertIsArray($this->uut->getPossibleStyles());
        } else {
            // PHPUnit < 7.5.
            $this->assertInternalType('array', $this->uut->getPossibleStyles());
        }
        $this->assertNotEmpty($this->uut->getPossibleStyles());
    }

    public function exceptionHelper($exception, $msg = null)
    {
        if (\method_exists($this, 'expectException')) {
            // PHPUnit 5+.
            $this->expectException($exception);
            if (isset($msg)) {
                $this->expectExceptionMessage($msg);
            }
        } else {
            // PHPUnit 4.
            if (isset($msg)) {
                $this->setExpectedException($exception, $msg);
            } else {
                $this->setExpectedException($exception);
            }
        }
    }
}

