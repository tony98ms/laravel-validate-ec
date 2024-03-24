<?php

namespace Tonystore\LaravelValidateEc\Tests;

use Tonystore\LaravelValidateEc\Rules\ValidDocumentEc;

class ValidateDocumentCiTest extends TestCase
{
    public function test_validate_ci()
    {
        $validator = $this->app['validator']->make([
            'ci' => '1718137159',

        ], [
            'ci' => 'document_ec:ci',
        ]);
        $this->assertTrue($validator->passes());
    }
    public function test_validate_ci_fail()
    {
        $validator = $this->app['validator']->make([
            'ci' => '1718137158',

        ], [
            'ci' => 'document_ec:ci',
        ]);
        $this->assertFalse($validator->passes());
    }
    public function test_validate_ci_with_rule()
    {
        $rules = ['ci' => [new ValidDocumentEc('ci')]];
        $data = ['ci' => '1718137159'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }
    public function test_validate_ci_with_rule_fail()
    {
        $rules = ['ci' => [new ValidDocumentEc('ci')]];
        $data = ['ci' => '1718137158'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
