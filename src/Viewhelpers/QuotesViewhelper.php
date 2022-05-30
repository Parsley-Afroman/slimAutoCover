<?php 
namespace SlimAutoCover\Viewhelpers;

class QuotesViewHelper
{
    public static function FormRender($quotes, $name)
    {
        $result = '<div>';
        $i = 1;
        foreach($quotes as $quote){
            $result .= '<h3> Quote Ref: ' . $i . '</h3>';
            $result .= '<h4>Car Type</h4>' . '<p>' . $quote['car_type_id'] . '</p>';
            $result .= '<h4>Cover Type</h4>' . '<p>' . $quote['cover_id'] . '</p>';
            $result .= '<h4>Cost</h4>' . '<p>' . $quote['cost'] . '</p>';
            $result .= 
                '<form method="post" action="/deleteQuote">
                    <input type="hidden" name="quoteID" value=' . $quote['id'] . '>
                    <input type="hidden" name="name" value=' . $name . '>
                    <input type="submit" value="Delete">
                </form>';
            $i++;
        }
        $result .= '</div>';
        return $result;
    }
}
?>