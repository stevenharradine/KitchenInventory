<?php
if (isset($_GET[barcode])) {
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

        $api_buffer = "API look ups left: $ratelimit_remaining";
  }
  if (isset($_GET[name])) {
    $name = $_GET[name];
  }

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
  include 'views/header.php';
  echo "$api_buffer";

  include 'views/createProduct.php';
  include 'views/footer.php';