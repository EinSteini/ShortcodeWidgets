# ShortcodeWidgets
<b>Shortcode Widgets</b> is a Wordpress Plugin that contains some widgets called by a shortcode.<br>
These are currently available:<br>

<h2>CSVContact</h2>
<p>CSVContact is widget that is pretty similar to Contact Forms 7, but with the major difference that it 
stores the submitted data into csv files. When one month is over, you get the csv file of the passed month
mailed to your admin email.</p>
<h3>Usage:</h3>
<p>In the beginning, you call the shortcode inside of the wordpress editor. The shortcode's name is <i>"csvcontact"</i>.
After that you can determine which form inputs in which order you want to use. This can be done by using the <i>"content"</i>
attribute. This attribute has to be a string where the wanted inputs can be passed in the wanted order, seperated by commas.<br>
<b>Currently available inputs:</b></p>
<ul>
  <li><b>name</b> gives the form two inputs in one row with "name" and "surname" </li> 
  <li><b>email</b> gives you a input field for email adresses</li>
  <li><b>message</b> gives you a textarea for a message </li>
  <li><b>adress</b> gives yo a text input for adresses</li>
  <li><b>beds</b> is a special input for hotels</li>
  <li><b>company</b> is a input for the company name</li>
  <li><b>period</b> is a tag with two inputs for arrival and departure date</li>
  <li><b>sector</b> gives you an input for the company's sector</li>
  <li><b>telephone</b> gives you an input for the telephone number</li>
</ul>
<p><code>[csvcontact content="name, email, message"]</code><p>
<p>You can change the labels, placeholders and titles inside the csv file in the settings, 
along with the email adress the files should be sent to, the text of the submit button and
the timezone relative to GMT that should be used in the csv file's "Time" section.
A shortcode generator is planned.</p>
