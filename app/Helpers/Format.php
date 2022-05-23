<?php

namespace App\Helpers;

class Format
{
    public static function TemplateHeader() :string
    {
        return '<table style="border-collapse: collapse; width: 100%; border-style: none;" border="0">
        <tbody>
        <tr>
        <td style="width: 12.8169%;">Lampiran</td>
        <td style="width: 1.14254%;">:</td>
        <td style="width: 82.7885%;">&nbsp;</td>
        </tr>
        <tr>
        <td style="width: 12.8169%;">Hal</td>
        <td style="width: 1.14254%;">:</td>
        <td style="width: 82.7885%;">&nbsp;</td>
        </tr>
        </tbody>
        </table>
        <p>Kepada Yth, <br />[Ganti dengan Nama yang ditunjukan]<br />[Alamat] <br />[Kota]</p>';
    }

    public static function TemplateBody() :string
    {
        return '<p>Dengan Hormat,</p>
        <p style="text-indent: 50px; text-align: justify;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum praesentium repellat animi. Dignissimos, ab dolorum laudantium qui ullam, accusantium voluptatum quos quae iste obcaecati beatae dicta animi corrupti velit. Ipsum. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum praesentium repellat animi. Dignissimos, ab dolorum laudantium qui ullam, accusantium voluptatum quos quae iste obcaecati beatae dicta animi corrupti velit. Ipsum. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum praesentium repellat animi. Dignissimos, ab dolorum laudantium qui ullam, accusantium voluptatum quos quae iste obcaecati beatae dicta animi corrupti velit. Ipsum. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum praesentium repellat animi. Dignissimos, ab dolorum laudantium qui ullam, accusantium voluptatum quos quae iste obcaecati beatae dicta animi corrupti velit. Ipsum.</p>
        <ol>
        <li style="text-align: justify;">Poin 1</li>
        <li style="text-align: justify;">Point 2</li>
        </ol>
        <p style="text-indent: 50px; text-align: justify;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum praesentium repellat animi. Dignissimos, ab dolorum laudantium qui ullam, accusantium voluptatum quos quae iste obcaecati beatae dicta animi corrupti velit. Ipsum. Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>';
    }

    public static function TemplateFooter() :string
    {
        return '<p style="text-indent: 50px; text-align: justify;">Demikian Surat ini saya buat dengan .....</p>';
    }


}


