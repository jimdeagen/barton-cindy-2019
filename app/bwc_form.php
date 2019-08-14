<?php
    $public_key = "6LdefpwUAAAAAAiVaCPbmskMnzCn4MP4tIh3sB4k";
    $private_key = "6LdefpwUAAAAANXxVGNTtUJ0Zq2sQGdP6zUueeLa";
    $url = "https://www.google.com/recaptcha/api/siteverify";
    
    if(array_key_exists('submit_form', $_POST)) {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

        $response_key = $_POST['g-recaptcha-response'];
        $response = file_get_contents($url.'?secret='.$private_key.'&response='.$response_key.'&remoteip='.$_SERVER['REMOTE_ADDR']);
        $response = json_decode($response);

        echo "<pre>";
        print_r($response);
        echo "</pre>";

        if($response -> success == 1) {
            echo "<p>Thanks for requesting a screening. I will contact you soon.</p>";
            console.log('SUCCESS');
        } else {
            echo "<p>Request was not submitted.</p>";
        }
    }
?>


<form
    name="contactform"
    action="mailform.php"
    method="post"
    id="form"
    class="screening__form--inputs"
    >

    <div class="input-city">
        <label>town</label>
        <br>
        <select class="screening__form--input" name="city" size="3">
        <option value="Granite Bay">Granite Bay</option>
        <option value="Folsom">Folsom</option>
        <option value="Roseville">Roseville</option>
        <option value="Placerville">Placerville</option>
        <option value="other">other</option>
        </select>
    </div>
    
    <div class="input-phone">
        <label>phone</label>
        <br>
    <input
        class="screening__form--input"
        type="tel"
        name="phone"
        id="phone"
        placeholder="Include area code"
    />
    </div>

    <div class="input-email">
        <label>email</label>
        <br>
        <input
        class="screening__form--input"
        type="email"
        name="email"
        id="email"
        required
        />
    </div>
    <div class="input-age">
        <label>child's age<br>(5 - 18/adult)</label>
        <select class="screening__form--input" name="age" size="3">
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="adult">18 / adult</option>
        </select>
    </div>

    <div class="input-message input-submit">
        <label
        >Briefly tell me of your child's challenges<br>with reading or
        spelling.</label
    >
    <br>
    <textarea
        class="screening__form--input"
        name="message"
        placeholder="Place message or comments here"
        id="message"
        required
    ></textarea>
    </div>
    <div class="g-recaptcha" data-sitekey="<?php print $public_key; ?>"></div>
    <input type="submit" name="submit_form" id="submit" class="form-submit" value="submit request" />
</form>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
