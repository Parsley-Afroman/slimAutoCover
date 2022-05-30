<?php 
namespace SlimAutoCover\Viewhelpers;

class QuoteAcceptanceFormViewHelper
{
    public static function FormRender($quote, $carType, $coverType)
    {
        $result = 
        '<form method="post" action="/quotes">
        <label>Quote Amount = ' . $quote . '</label>
        <input type="hidden" value=' . $quote . ' name="quote">
        <input name="fullName" type="text" placeholder="Enter Full Name">
        <input type="hidden" value=' . $carType . ' name="carType">
        <input type="hidden" value=' . $coverType . ' name="coverType">
        <input type="submit" value="accept" name="accept">
        <input type="submit" value="reject" name="reject">
        </form>';

        return $result;
    }
}
?>