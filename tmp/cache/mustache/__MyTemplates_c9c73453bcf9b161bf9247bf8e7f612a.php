<?php

class __MyTemplates_c9c73453bcf9b161bf9247bf8e7f612a extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<!DOCTYPE html>
';
        $buffer .= $indent . '	<html>
';
        $buffer .= $indent . '	<head>
';
        $buffer .= $indent . '			<meta charset="utf-8">
';
        $buffer .= $indent . '			<meta http-equiv="X-UA-Compatible" content="IE=edge">
';
        $buffer .= $indent . '			<title><?php echo $dados[\'nome\']." ".$dados[\'sobrenome\'] ?></title>
';
        $buffer .= $indent . '			<link rel="stylesheet" href="">
';
        $buffer .= $indent . '	</head>
';
        $buffer .= $indent . '	<body>
';
        $buffer .= $indent . '		<h1>Hello ';
        $value = $this->resolveValue($context->find('name'), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '</h1>
';
        $buffer .= $indent . '		<p>You have just won $';
        $value = $this->resolveValue($context->find('value'), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '!</p>
';
        $buffer .= $indent . '		<ul>
';
        // 'in_ca' section
        $buffer .= $this->section970e45c43544437a5457ef8086300a27($context, $indent, $context->find('in_ca'));
        $buffer .= $indent . '		</ul>		
';
        $buffer .= $indent . '	</body>
';
        $buffer .= $indent . '</html>';

        return $buffer;
    }

    private function section970e45c43544437a5457ef8086300a27(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (is_object($value) && is_callable($value)) {
            $source = '
			<li>Well, ${{taxed_value}}, after taxes.</li>
			';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '			<li>Well, $';
                $value = $this->resolveValue($context->find('taxed_value'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= ', after taxes.</li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
