<?php
$dom = new DOMDocument('1.0');//Create new document

//Create the CSS styles
$css_text = '';
$css_text .= 'body{width:285px;margin:auto;margin-top:50px;}';
$css_text .= '#my_table{border:1px solid #ececec;}';
$css_text .= '#my_table th{border:1px solid #ececec;padding:5px;text-decoration:underline;}';
$css_text .= '#my_table td{border:1px solid #ececec;padding:5px;}';
$css_text .= '#my_table td:first-child{text-align:right;color:#333333;font-weight:bold;color:#999999;}';

$style = $dom->createElement('style', $css_text);//Create new <style> tag with the css tags

$domAttribute = $dom->createAttribute('type');//Create the new attribute

$domAttribute->value = 'text/css';//Add value to attribute

$style->appendChild($domAttribute);//Add the attribute to the style tag

$dom->appendChild($style);//Add the style tag to document

//Add the form
$form = $dom->createElement('form');
$dom->appendChild($form);
$formAttribute = $dom->createAttribute('method');
$formAttribute->value = 'post';
$form->appendChild($formAttribute);

//Add the table
$table = $dom->createElement('table');
$tableAttribute = $dom->createAttribute('id');
$tableAttribute->value = 'my_table';
$table->appendChild($tableAttribute);

//Add new row
$tr = $dom->createElement('tr');
$table->appendChild($tr);

//Add new column
$th = $dom->createElement('th', 'Generate HTML using PHP');
$tr->appendChild($th);
$thAttribute = $dom->createAttribute('colspan');
$thAttribute->value = '2';
$th->appendChild($thAttribute);


//Add new row
$tr = $dom->createElement('tr');
$table->appendChild($tr);

//Add new column
$td = $dom->createElement('td', 'First Name');
$tr->appendChild($td);

//Add new column
$td = $dom->createElement('td');
$tr->appendChild($td);

//Add input element to column
$input = $dom->createElement('input');
$td->appendChild($input);
$tdAttribute = $dom->createAttribute('type');
$tdAttribute->value = 'text';
$input->appendChild($tdAttribute);
$tdAttribute = $dom->createAttribute('name');
$tdAttribute->value = 'f_name';
$input->appendChild($tdAttribute);

//Add new row
$tr = $dom->createElement('tr');
$table->appendChild($tr);

//Add new column
$td = $dom->createElement('td', 'Email');
$tr->appendChild($td);

//Add new column
$td = $dom->createElement('td');
$tr->appendChild($td);

//Add input element to column
$input = $dom->createElement('input');
$td->appendChild($input);
$tdAttribute = $dom->createAttribute('type');
$tdAttribute->value = 'text';
$input->appendChild($tdAttribute);
$tdAttribute = $dom->createAttribute('name');
$tdAttribute->value = 'e-mail';
$input->appendChild($tdAttribute);

//Add new row
$tr = $dom->createElement('tr');
$table->appendChild($tr);

//Add new column
$td = $dom->createElement('td', 'Gender');
$tr->appendChild($td);

//Add new column
$td = $dom->createElement('td');
$tr->appendChild($td);

//Add input element to column
$select = $dom->createElement('select');
$td->appendChild($select);
$tdAttribute = $dom->createAttribute('name');
$tdAttribute->value = 'gender';
$select->appendChild($tdAttribute);
//Add options to select box
$opt = $dom->createElement('option', 'Male');
$domAttribute = $dom->createAttribute('value');
$domAttribute->value = 'male';
$opt->appendChild($domAttribute);
$select->appendChild($opt);

$opt = $dom->createElement('option', 'Female');
$domAttribute = $dom->createAttribute('value');
$domAttribute->value = 'female';
$opt->appendChild($domAttribute);
$select->appendChild($opt);


//Add new row
$tr = $dom->createElement('tr');
$table->appendChild($tr);

//Add new column
$td = $dom->createElement('td', 'Interest');
$tr->appendChild($td);

//Add new column
$td = $dom->createElement('td');
$tr->appendChild($td);

//Add input element to column
$radio = $dom->createElement('input');
$td->appendChild($radio);
$radAttribute = $dom->createAttribute('type');
$radAttribute->value = 'radio';
$radio->appendChild($radAttribute);
$radAttribute = $dom->createAttribute('name');
$radAttribute->value = 'interest';
$radio->appendChild($radAttribute);
$radAttribute = $dom->createAttribute('id');
$radAttribute->value = 'php';
$radio->appendChild($radAttribute);

$label = $dom->createElement('label', 'PHP');
$labelAttribute = $dom->createAttribute('for');
$labelAttribute->value = 'php';
$label->appendChild($labelAttribute);
$td->appendChild($label);

$radio = $dom->createElement('input');
$td->appendChild($radio);
$radAttribute = $dom->createAttribute('type');
$radAttribute->value = 'radio';
$radio->appendChild($radAttribute);
$radAttribute = $dom->createAttribute('name');
$radAttribute->value = 'interest';
$radio->appendChild($radAttribute);
$radAttribute = $dom->createAttribute('id');
$radAttribute->value = 'jquery';
$radio->appendChild($radAttribute);

$label = $dom->createElement('label', 'jQuery');
$labelAttribute = $dom->createAttribute('for');
$labelAttribute->value = 'jquery';
$label->appendChild($labelAttribute);
$td->appendChild($label);

//Add new row
$tr = $dom->createElement('tr');
$table->appendChild($tr);

//Add new column
$td = $dom->createElement('td');
$tr->appendChild($td);
$tdAttribute = $dom->createAttribute('colspan');
$tdAttribute->value = '2';
$td->appendChild($tdAttribute);

//Add input element to column
$input = $dom->createElement('input');
$td->appendChild($input);
$tdAttribute = $dom->createAttribute('type');
$tdAttribute->value = 'submit';
$input->appendChild($tdAttribute);
$tdAttribute = $dom->createAttribute('value');
$tdAttribute->value = 'Sign-Up';
$input->appendChild($tdAttribute);


//Add table to form
$form->appendChild($table);

echo $dom->saveHTML();
?>