<?php
        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "https://api.upcitemdb.com/prod/trial/lookup?upc=$_GET[barcode]");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $body = substr($output, $header_size);

        $headers = get_headers_from_curl_response($output);
        $body_json = json_decode($body);

        $ratelimit_remaining = $headers['X-RateLimit-Remaining'];

        if (strcmp ($body_json->code, 'INVALID_UPC') !== 0) {
          $name = $body_json->items[0]->title;
          $size = $body_json->items[0]->size;
        }

        // close curl resource to free up system resources
        curl_close($ch);

function get_headers_from_curl_response($response)
{
    $headers = array();

    $header_text = substr($response, 0, strpos($response, "\r\n\r\n"));

    foreach (explode("\r\n", $header_text) as $i => $line)
        if ($i === 0)
            $headers['http_code'] = $line;
        else
        {
            list ($key, $value) = explode(': ', $line);

            $headers[$key] = $value;
        }

    return $headers;
}
?>

<?php
  $title = 'Create new product';
  include 'header.php';
  include 'menu.php';
  echo "API look ups left: $ratelimit_remaining";
?>
    <form action="create-product.php" method="post">
      <table>
        <tbody>
          <tr>
            <th>Name</th>
            <td><input id="name" type="text" name="name" value="<?php echo $name ?>" /></td>
          </tr>
          <tr>
            <th>Size</th>
            <td><input type="text" name="size" value="<?php echo $size ?>" /></td>
          </tr>
          <tr>
            <th>Unit</th>
            <td><input type="text" name="unit" /></td>
          </tr>
          <tr>
            <th>Barcode</th>
            <td><input type="text" name="barcode" value="<?php echo $_GET['barcode'] ?>" /></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" name="Add to inventory" id="submit" /></td>
          </tr>
        </tbody>
      </table>
    </form>
    <script>
window.onload = function () {
  var input = document.getElementById('name');
  input.focus();
  input.select();
}
    </script>
  </body>
</html>