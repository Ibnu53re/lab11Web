<?php
class Form {
    private $fields = [];
    private $action;
    private $submit = "Submit Form";
    private $jumField = 0;

    public function __construct($action, $submit) {
        $this->action = $action;
        $this->submit = $submit;
    }

    public function addField($name, $label) {
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->jumField++;
    }

    public function displayForm() {
        echo "<form action='".$this->action."' method='POST'>";
        echo "<table>";
        foreach ($this->fields as $field) {
            echo "<tr><td>".$field['label']."</td>";
            echo "<td><input type='text' name='".$field['name']."'></td></tr>";
        }
        echo "<tr><td colspan='2'><input type='submit' value='".$this->submit."'></td></tr>";
        echo "</table></form>";
    }
}
?>
