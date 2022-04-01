<?php

namespace SlimAutoCover\Viewhelpers;

class FormViewHelper
{
    public static function FormRender($carType, $coverType)
    {

        $carTypeOutput = '';
        foreach ($carType as $type) {
            $carTypeOutput .= '<option value="' . $type['id'] . '">';
            $carTypeOutput .= $type['type'];
            $carTypeOutput .= '</option>';
        }

        $coverTypeOutput = '';
        foreach ($coverType as $cover) {
            $coverTypeOutput .= '<option value="' . $cover['id'] . '">';
            $coverTypeOutput .= $cover['cover'];
            $coverTypeOutput .= '</option>';
        }


        $result = ' <form method="post" action="/newQuote">
                    <label>Car Type:</label>
                    <select name="carType">' . $carTypeOutput . ' </select>'
            . '<label>Cover Type:</label>
                        <select name="coverType">' . $coverTypeOutput . '</select>
                        <input name="carValue" type="number" min="0">
                        <input type="submit">
                    </form>';


        return $result;
    }

}
