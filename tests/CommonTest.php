<?php

namespace Tests;

use CodeIgniter\Test\CIUnitTestCase;

/**
 * @internal
 */
final class CommonTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config('Paths')->viewDirectory = SUPPORTPATH . 'Views';
    }

    public function testViewFragmentNone()
    {
        $data = [
            'testString1' => 'Hello World',
            'testString2' => 'Hello World',
        ];

        $expected = '';

        $this->assertSame($expected, view_fragment('view_fragment', '', $data));
    }

    public function testViewFragmentOne()
    {
        $data = [
            'testString1' => 'Hello World',
            'testString2' => 'Hello World',
        ];

        $expected = "Hello World, fragment1!\n";

        $this->assertSame($expected, view_fragment('view_fragment', 'sample1', $data));
    }

    public function testViewFragmentTwo()
    {
        $data = [
            'testString1' => 'Hello World',
            'testString2' => 'Hello World',
        ];

        $expected = "Hello World, fragment1!\nHello World, fragment2!\n";

        $this->assertSame($expected, view_fragment('view_fragment', ['sample1', 'sample2'], $data));
    }

    public function testViewFragmentSaveData()
    {
        $data = [
            'testString1' => 'Hello World',
            'testString2' => 'Hello World',
        ];

        $expected = "Hello World, fragment1!\nHello World, fragment2!\n";

        $this->assertSame($expected, view_fragment('view_fragment', ['sample1', 'sample2'], $data, ['saveData' => true]));
    }
}
