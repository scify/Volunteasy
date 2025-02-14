{!! Form::open(['id' => 'aaaa', 'method' => 'POST', 'action' => ['Api\VolunteerApiController@store']]) !!}

<form action="/ethelontismos/symetoxh" accept-charset="UTF-8" method="post" id="ethelontismosform-my-form">
<div><style>
 .form-radios .form-item {
display:inline;
margin: 10px;
}</style>
Με τη συμπλήρωση της παρακάτω φόρμας εκδηλώνετε το ενδιαφέρον σας για
τον <a href="/ethelontismos" class="intlink">εθελοντισμό</a> στο Δήμο Αθηναίων.<br>Τα στοιχεία που σας ζητάμε είναι
χρήσιμα για την αξιοποίηση τόσο της διαθεσιμότητάς σας όσο και των
ικανοτήτων σας στις δράσεις του Γραφείου Εθελοντισμού. Ο στόχος μας
είναι να συμμετέχετε σε δράσεις που είναι πιο κοντά σε όσα σας αρέσουν
και σας ταιριάζουν. Όσο περισσότερα πεδία συμπληρώσετε, τόσο καλύτερα
μας βοηθάτε να σας γνωρίσουμε.<br><br><fieldset class=" collapsible"><legend class="collapse-processed"><a href="#">ΑΤΟΜΙΚΑ ΣΤΟΙΧΕΙΑ</a></legend><div class="fieldset-wrapper"><div class="form-item" id="edit-Όνομα-wrapper">
 <label for="edit-Όνομα">Όνομα: <span class="form-required" title="Το πεδίο είναι απαραίτητο.">*</span></label>
 <input type="text" maxlength="20" name="Όνομα" id="edit-Όνομα" size="20" value="" class="form-text required">
 <div class="description">Παρακαλώ συμπληρώστε το ονομά σας.</div>
</div><div class="form-item" id="edit-Επώνυμο-wrapper">
 <label for="edit-Επώνυμο">Επώνυμο: <span class="form-required" title="Το πεδίο είναι απαραίτητο.">*</span></label>
 <input type="text" maxlength="40" name="Επώνυμο" id="edit-Επώνυμο" size="40" value="" class="form-text required">
 <div class="description">Παρακαλώ συμπληρώστε το επώνυμο σας.</div>
</div><div class="form-item" id="edit-Όνομα-Πατέρα-wrapper">
 <label for="edit-Όνομα-Πατέρα">Όνομα Πατέρα: <span class="form-required" title="Το πεδίο είναι απαραίτητο.">*</span></label>
 <input type="text" maxlength="20" name="Όνομα_Πατέρα" id="edit-Όνομα-Πατέρα" size="20" value="" class="form-text required">
 <div class="description">Παρακαλώ συμπληρώστε το όνομα του πατέρα σας.</div>
</div><div class="form-item" id="edit-Τύπος-Ταυτότητας-wrapper">
 <label for="edit-Τύπος-Ταυτότητας">Τύπος Ταυτότητας: </label>
 <select name="Τύπος_Ταυτότητας" class="form-select" id="edit-Τύπος-Ταυτότητας"><option value="Α.Δ.Τ.">Α.Δ.Τ.</option><option value="Διαβατήριο">Διαβατήριο</option><option value="Άδεια Παραμονής">Άδεια Παραμονής</option></select>
</div><div class="form-item" id="edit-Ταυτότητα-wrapper">
 <input type="text" maxlength="20" name="Ταυτότητα" id="edit-Ταυτότητα" size="20" value="" class="form-text">
 <div class="description">Παρακαλώ συμπληρώστε το Α.Δ.Τ. ή Διαβατηρίου ή Άδεια Παραμονής και επιλέξτε απο την λίστα τον τύπο.</div>
</div><div class="container-inline-date date-clear-block"><div class="form-item" id="edit-Ημερομηνία-Γέννησης-wrapper">
 <label for="edit-Ημερομηνία-Γέννησης">Ημερομηνία Γέννησης: <span class="form-required" title="Το πεδίο είναι απαραίτητο.">*</span></label>
 <div class="date-day"><div class="form-item" id="edit-Ημερομηνία-Γέννησης-day-wrapper">
 <select name="Ημερομηνία_Γέννησης[day]" class="form-select required  date-day" id="edit-Ημερομηνία-Γέννησης-day"><option value="" selected="selected">-Ημέρα</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select>
</div>
</div><div class="date-month"><div class="form-item" id="edit-Ημερομηνία-Γέννησης-month-wrapper">
 <select name="Ημερομηνία_Γέννησης[month]" class="form-select required  date-month" id="edit-Ημερομηνία-Γέννησης-month"><option value="" selected="selected">-Μήνας</option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option></select>
</div>
</div><div class="date-year"><div class="form-item" id="edit-Ημερομηνία-Γέννησης-year-wrapper">
 <select name="Ημερομηνία_Γέννησης[year]" class="form-select required  date-year" id="edit-Ημερομηνία-Γέννησης-year"><option value="" selected="selected">-Έτος</option><option value="1935">1935</option><option value="1936">1936</option><option value="1937">1937</option><option value="1938">1938</option><option value="1939">1939</option><option value="1940">1940</option><option value="1941">1941</option><option value="1942">1942</option><option value="1943">1943</option><option value="1944">1944</option><option value="1945">1945</option><option value="1946">1946</option><option value="1947">1947</option><option value="1948">1948</option><option value="1949">1949</option><option value="1950">1950</option><option value="1951">1951</option><option value="1952">1952</option><option value="1953">1953</option><option value="1954">1954</option><option value="1955">1955</option><option value="1956">1956</option><option value="1957">1957</option><option value="1958">1958</option><option value="1959">1959</option><option value="1960">1960</option><option value="1961">1961</option><option value="1962">1962</option><option value="1963">1963</option><option value="1964">1964</option><option value="1965">1965</option><option value="1966">1966</option><option value="1967">1967</option><option value="1968">1968</option><option value="1969">1969</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option></select>
</div>
</div>
 <div class="description">DD-MM-YYYY</div>
</div>
</div><div class="form-item">
 <label>Φύλο: <span class="form-required" title="Το πεδίο είναι απαραίτητο.">*</span></label>
 <div class="form-radios"><div class="form-item" id="edit-Φύλο-Άνδρας-wrapper">
 <label class="option" for="edit-Φύλο-Άνδρας"><input type="radio" id="edit-Φύλο-Άνδρας" name="Φύλο" value="Άνδρας" class="form-radio"> Άνδρας</label>
</div>
<div class="form-item" id="edit-Φύλο-Γυναίκα-wrapper">
 <label class="option" for="edit-Φύλο-Γυναίκα"><input type="radio" id="edit-Φύλο-Γυναίκα" name="Φύλο" value="Γυναίκα" class="form-radio"> Γυναίκα</label>
</div>
</div>
</div><div class="form-item" id="edit-Οικογενειακή-Κατάσταση-wrapper">
 <label for="edit-Οικογενειακή-Κατάσταση">Οικογενειακή Κατάσταση: </label>
 <select name="Οικογενειακή_Κατάσταση" class="form-select" id="edit-Οικογενειακή-Κατάσταση"><option value="" selected="selected">- Επιλέξτε -</option><option value="άγαμος/η">άγαμος/η</option><option value="παντρεμένος/η">παντρεμένος/η</option><option value="χήρος/α">χήρος/α</option><option value="διαζευγμένος/η">διαζευγμένος/η</option></select>
</div><div class="form-item" id="edit-Τέκνα-wrapper">
 <label for="edit-Τέκνα">Τέκνα: </label>
 <input type="text" maxlength="2" name="Τέκνα" id="edit-Τέκνα" size="2" value="" class="form-text">
</div><div class="form-item" id="edit-Διεύθυνση-wrapper">
 <label for="edit-Διεύθυνση">Διεύθυνση: </label>
 <input type="text" maxlength="100" name="Διεύθυνση" id="edit-Διεύθυνση" size="60" value="" class="form-text">
</div><div class="form-item" id="edit-Τ-Κ-wrapper">
 <label for="edit-Τ-Κ">Τ.Κ.: </label>
 <input type="text" maxlength="6" name="Τ_Κ" id="edit-Τ-Κ" size="6" value="" class="form-text">
</div><div class="form-item" id="edit-Πόλη-wrapper">
 <label for="edit-Πόλη">Πόλη: </label>
 <input type="text" maxlength="50" name="Πόλη" id="edit-Πόλη" size="50" value="" class="form-text">
</div><div class="form-item" id="edit-Χώρα-wrapper">
 <label for="edit-Χώρα">Χώρα: </label>
 <input type="text" maxlength="50" name="Χώρα" id="edit-Χώρα" size="50" value="" class="form-text">
</div><div class="form-item" id="edit-Κάτοικος-Ελλάδας-wrapper">
 <label class="option" for="edit-Κάτοικος-Ελλάδας"><input type="checkbox" name="Κάτοικος_Ελλάδας" id="edit-Κάτοικος-Ελλάδας" value="Είναι Κάτοικος Ελλάδας" checked="checked" class="form-checkbox"> Κάτοικος Ελλάδας</label>
 <div class="description">Αποεπιλέξτε εφόσον δεν διαμένετε μόνιμα στην Ελλάδα</div>
</div></div>












</fieldset>
<fieldset class=" collapsible"><legend class="collapse-processed"><a href="#">ΣΤΟΙΧΕΙΑ ΕΠΙΚΟΙΝΩΝΙΑΣ</a></legend><div class="fieldset-wrapper"><div class="form-item" id="edit-Τηλέφωνο-Οικίας-wrapper">
 <label for="edit-Τηλέφωνο-Οικίας">Τηλέφωνο Οικίας: </label>
 <input type="text" maxlength="15" name="Τηλέφωνο_Οικίας" id="edit-Τηλέφωνο-Οικίας" size="15" value="" class="form-text">
</div><div class="form-item" id="edit-Τηλέφωνο-Εργασίας-wrapper">
 <label for="edit-Τηλέφωνο-Εργασίας">Τηλέφωνο Εργασίας: </label>
 <input type="text" maxlength="15" name="Τηλέφωνο_Εργασίας" id="edit-Τηλέφωνο-Εργασίας" size="15" value="" class="form-text">
</div><div class="form-item" id="edit-Κινητό-wrapper">
 <label for="edit-Κινητό">Κινητό: </label>
 <input type="text" maxlength="15" name="Κινητό" id="edit-Κινητό" size="15" value="" class="form-text">
</div><div class="form-item" id="edit-Fax-wrapper">
 <label for="edit-Fax">Fax: </label>
 <input type="text" maxlength="15" name="Fax" id="edit-Fax" size="15" value="" class="form-text">
</div><div class="form-item" id="edit-email-wrapper">
 <label for="edit-email">email: <span class="form-required" title="Το πεδίο είναι απαραίτητο.">*</span></label>
 <input type="text" maxlength="128" name="email" id="edit-email" size="50" value="" class="form-text required">
 <div class="description">Συμπληρώστε την διεύθυνση στην μορφή "xxx@xxx.xx"</div>
</div><div class="form-item" id="edit-Τρόπος-επικοινωνίας-wrapper">
 <label for="edit-Τρόπος-επικοινωνίας">Να επικοινωνήσουμε μαζί σας στο: </label>
 <select name="Τρόπος_επικοινωνίας" class="form-select" id="edit-Τρόπος-επικοινωνίας"><option value="email">Ηλεκτρονικό ταχυδρομείο</option><option value="Τηλέφωνο Οικίας">Τηλέφωνο Οικίας</option><option value="Τηλέφωνο Εργασίας">Τηλέφωνο Εργασίας</option><option value="Κινητό Τηλέφωνο">Κινητό Τηλέφωνο</option></select>
</div></div>





</fieldset>
<fieldset class=" collapsible"><legend class="collapse-processed"><a href="#">ΕΚΠΑΙΔΕΥΣΗ &amp; ΙΚΑΝΟΤΗΤΕΣ</a></legend><div class="fieldset-wrapper"><div class="form-item" id="edit-Επίπεδο-εκπαίδευσης-wrapper">
 <label for="edit-Επίπεδο-εκπαίδευσης">Επίπεδο εκπαίδευσης: <span class="form-required" title="Το πεδίο είναι απαραίτητο.">*</span></label>
 <select name="Επίπεδο_εκπαίδευσης" class="form-select required" id="edit-Επίπεδο-εκπαίδευσης"><option value="select">- Επιλέξτε -</option><option value="Δημοτικό">Δημοτικό</option><option value="Γυμνάσιο">Γυμνάσιο</option><option value="Λύκειο">Λύκειο</option><option value="Ανώτερη">Ανώτερη</option><option value="Ανώτατη">Ανώτατη</option><option value="Μεταπτυχιακά">Μεταπτυχιακά</option></select>
 <div class="description">Επιλέξτε απο την λίστα το επίπεδο της εκπαίδευσης σας.</div>
</div><div class="form-item" id="edit-Ειδικότητα-wrapper">
 <label for="edit-Ειδικότητα">Ειδικότητα: </label>
 <input type="text" maxlength="50" name="Ειδικότητα" id="edit-Ειδικότητα" size="50" value="" class="form-text">
</div><div class="form-item" id="edit-Σχολή-wrapper">
 <label for="edit-Σχολή">Σχολή: </label>
 <input type="text" maxlength="50" name="Σχολή" id="edit-Σχολή" size="50" value="" class="form-text">
</div><fieldset><legend>Ξένες Γλώσσες</legend><div class="form-item">
 <label>Ελληνικά: </label>
 <div class="form-radios"><div class="form-item" id="edit-Ελληνικά-Βασικό-wrapper">
 <label class="option" for="edit-Ελληνικά-Βασικό"><input type="radio" id="edit-Ελληνικά-Βασικό" name="Ελληνικά" value="Βασικό" class="form-radio"> Βασικό</label>
</div>
<div class="form-item" id="edit-Ελληνικά-Καλό-wrapper">
 <label class="option" for="edit-Ελληνικά-Καλό"><input type="radio" id="edit-Ελληνικά-Καλό" name="Ελληνικά" value="Καλό" class="form-radio"> Καλό</label>
</div>
<div class="form-item" id="edit-Ελληνικά-Πολύ-Καλό-wrapper">
 <label class="option" for="edit-Ελληνικά-Πολύ-Καλό"><input type="radio" id="edit-Ελληνικά-Πολύ-Καλό" name="Ελληνικά" value="Πολύ Καλό" class="form-radio"> Πολύ Καλό</label>
</div>
</div>
</div>
<div class="form-item">
 <label>Αγγλικά: </label>
 <div class="form-radios"><div class="form-item" id="edit-Αγγλικά-Βασικό-wrapper">
 <label class="option" for="edit-Αγγλικά-Βασικό"><input type="radio" id="edit-Αγγλικά-Βασικό" name="Αγγλικά" value="Βασικό" class="form-radio"> Βασικό</label>
</div>
<div class="form-item" id="edit-Αγγλικά-Καλό-wrapper">
 <label class="option" for="edit-Αγγλικά-Καλό"><input type="radio" id="edit-Αγγλικά-Καλό" name="Αγγλικά" value="Καλό" class="form-radio"> Καλό</label>
</div>
<div class="form-item" id="edit-Αγγλικά-Πολύ-Καλό-wrapper">
 <label class="option" for="edit-Αγγλικά-Πολύ-Καλό"><input type="radio" id="edit-Αγγλικά-Πολύ-Καλό" name="Αγγλικά" value="Πολύ Καλό" class="form-radio"> Πολύ Καλό</label>
</div>
</div>
</div>
<div class="form-item">
 <label>Γαλλικά: </label>
 <div class="form-radios"><div class="form-item" id="edit-Γαλλικά-Βασικό-wrapper">
 <label class="option" for="edit-Γαλλικά-Βασικό"><input type="radio" id="edit-Γαλλικά-Βασικό" name="Γαλλικά" value="Βασικό" class="form-radio"> Βασικό</label>
</div>
<div class="form-item" id="edit-Γαλλικά-Καλό-wrapper">
 <label class="option" for="edit-Γαλλικά-Καλό"><input type="radio" id="edit-Γαλλικά-Καλό" name="Γαλλικά" value="Καλό" class="form-radio"> Καλό</label>
</div>
<div class="form-item" id="edit-Γαλλικά-Πολύ-Καλό-wrapper">
 <label class="option" for="edit-Γαλλικά-Πολύ-Καλό"><input type="radio" id="edit-Γαλλικά-Πολύ-Καλό" name="Γαλλικά" value="Πολύ Καλό" class="form-radio"> Πολύ Καλό</label>
</div>
</div>
</div>
<div class="form-item">
 <label>Ισπανικά: </label>
 <div class="form-radios"><div class="form-item" id="edit-Ισπανικά-Βασικό-wrapper">
 <label class="option" for="edit-Ισπανικά-Βασικό"><input type="radio" id="edit-Ισπανικά-Βασικό" name="Ισπανικά" value="Βασικό" class="form-radio"> Βασικό</label>
</div>
<div class="form-item" id="edit-Ισπανικά-Καλό-wrapper">
 <label class="option" for="edit-Ισπανικά-Καλό"><input type="radio" id="edit-Ισπανικά-Καλό" name="Ισπανικά" value="Καλό" class="form-radio"> Καλό</label>
</div>
<div class="form-item" id="edit-Ισπανικά-Πολύ-Καλό-wrapper">
 <label class="option" for="edit-Ισπανικά-Πολύ-Καλό"><input type="radio" id="edit-Ισπανικά-Πολύ-Καλό" name="Ισπανικά" value="Πολύ Καλό" class="form-radio"> Πολύ Καλό</label>
</div>
</div>
</div>
<div class="form-item">
 <label>Γερμανικά: </label>
 <div class="form-radios"><div class="form-item" id="edit-Γερμανικά-Βασικό-wrapper">
 <label class="option" for="edit-Γερμανικά-Βασικό"><input type="radio" id="edit-Γερμανικά-Βασικό" name="Γερμανικά" value="Βασικό" class="form-radio"> Βασικό</label>
</div>
<div class="form-item" id="edit-Γερμανικά-Καλό-wrapper">
 <label class="option" for="edit-Γερμανικά-Καλό"><input type="radio" id="edit-Γερμανικά-Καλό" name="Γερμανικά" value="Καλό" class="form-radio"> Καλό</label>
</div>
<div class="form-item" id="edit-Γερμανικά-Πολύ-Καλό-wrapper">
 <label class="option" for="edit-Γερμανικά-Πολύ-Καλό"><input type="radio" id="edit-Γερμανικά-Πολύ-Καλό" name="Γερμανικά" value="Πολύ Καλό" class="form-radio"> Πολύ Καλό</label>
</div>
</div>
</div>
<div class="form-item" id="edit-Άλλες-γλώσες-wrapper">
 <label for="edit-Άλλες-γλώσες">Άλλες γλώσες: </label>
 <div class="resizable-textarea"><span><textarea cols="60" rows="5" name="Άλλες_γλώσες" id="edit-Άλλες-γλώσες" class="form-textarea resizable textarea-processed"></textarea><div class="grippie" style="margin-right: -6px;"></div></span></div>
 <div class="description">Συμπληρώστε τις επιπλέον γλώσσες που γνωρίζετε και το επιπεδό σας</div>
</div>
</fieldset><div class="form-item" id="edit-Δίπλωμα-οδήγησης-wrapper">
 <label for="edit-Δίπλωμα-οδήγησης">Δίπλωμα οδήγησης - Κατηγορία: </label>
 <select name="Δίπλωμα_οδήγησης" class="form-select" id="edit-Δίπλωμα-οδήγησης"><option value="" selected="selected">- Επιλέξτε -</option><option value="Χωρίς Δίπλωμα">Χωρίς Δίπλωμα</option><option value="Α κατηγορίας">Α κατηγορίας</option><option value="Α1 κατηγορίας">Α1 κατηγορίας</option><option value="Β κατηγορίας">Β κατηγορίας</option><option value="Γ κατηγορίας">Γ κατηγορίας</option><option value="Γ+Ε κατηγορίας">Γ+Ε κατηγορίας</option></select>
 <div class="description">Επιλέξτε την κατηγορία του διπλώματος σας εάν έχετε.</div>
</div><div class="form-item" id="edit-Χρήση-υπολογιστή-wrapper">
 <label class="option" for="edit-Χρήση-υπολογιστή"><input type="checkbox" name="Χρήση_υπολογιστή" id="edit-Χρήση-υπολογιστή" value="ΝΑΙ χρήση" class="form-checkbox"> Χρήση υπολογιστή</label>
</div><div class="form-item" id="edit-Πρόσθετες-ικανότητες-wrapper">
 <label for="edit-Πρόσθετες-ικανότητες">Πρόσθετες ικανότητες, προσόντα και εμπειρία : </label>
 <div class="resizable-textarea"><span><textarea cols="60" rows="5" name="Πρόσθετες_ικανότητες" id="edit-Πρόσθετες-ικανότητες" class="form-textarea resizable textarea-processed"></textarea><div class="grippie" style="margin-right: -6px;"></div></span></div>
 <div class="description">Συμπληρώστε τυχόν επιπλέον πρόσθετες ικανότητες, προσόντα και εμπειρία που διαθέτετε.</div>
</div></div>






</fieldset>
<fieldset class=" collapsible"><legend class="collapse-processed"><a href="#">ΕΡΓΑΣΙΑΚΗ ΕΜΠΕΙΡΙΑ</a></legend><div class="fieldset-wrapper"><div class="form-item" id="edit-Εργασιακή-κατάσταση-wrapper">
 <label for="edit-Εργασιακή-κατάσταση">Εργασιακή κατάσταση: <span class="form-required" title="Το πεδίο είναι απαραίτητο.">*</span></label>
 <select name="Εργασιακή_κατάσταση" class="form-select required" id="edit-Εργασιακή-κατάσταση"><option value="select">- Επιλέξτε -</option><option value="Φοιτητής">Φοιτητής</option><option value="Εργαζόμενος">Εργαζόμενος</option><option value="Άνεργος">Άνεργος</option><option value="Συνταξιούχος">Συνταξιούχος</option></select>
</div><div class="form-item" id="edit-Εργασία-wrapper">
 <label for="edit-Εργασία">Εργασία: </label>
 <div class="resizable-textarea"><span><textarea cols="60" rows="5" name="Εργασία" id="edit-Εργασία" class="form-textarea resizable textarea-processed"></textarea><div class="grippie" style="margin-right: -6px;"></div></span></div>
 <div class="description">Περιγράψτε την θέσης σας στην παρούσα ή την πιο πρόσφατη εργασία σας</div>
</div></div>

</fieldset>
<fieldset class=" collapsible"><legend class="collapse-processed"><a href="#">ΕΘΕΛΟΝΤΙΚΗ ΠΡΟΣΦΟΡΑ</a></legend><div class="fieldset-wrapper"><div class="form-item" id="edit-Λόγος-συμετοχής-wrapper">
 <label for="edit-Λόγος-συμετοχής">Λόγος συμετοχής: <span class="form-required" title="Το πεδίο είναι απαραίτητο.">*</span></label>
 <div class="resizable-textarea"><span><textarea cols="60" rows="5" name="Λόγος_συμετοχής" id="edit-Λόγος-συμετοχής" class="form-textarea resizable required textarea-processed"></textarea><div class="grippie" style="margin-right: -6px;"></div></span></div>
 <div class="description">Περιγράψτε τους λόγους που θέλετε να γίνετε εθελοντής.</div>
</div><div class="form-item" id="edit-Εθελοντική-οργάνωση-wrapper">
 <label for="edit-Εθελοντική-οργάνωση">Εθελοντική οργάνωση: </label>
 <div class="resizable-textarea"><span><textarea cols="60" rows="5" name="Εθελοντική_οργάνωση" id="edit-Εθελοντική-οργάνωση" class="form-textarea resizable textarea-processed"></textarea><div class="grippie" style="margin-right: -6px;"></div></span></div>
 <div class="description">Εαν ανήκετε ή ανήκατε σε κάποιες εθελοντικές οργανώσεις ποιο ήταν το αντικείμενο τους και για πόσο χρονικό διάστημα είχατε συμετοχή.</div>
</div><div class="form-item" id="edit-Εθελοντικές-δράσεις-wrapper">
 <label for="edit-Εθελοντικές-δράσεις">Εθελοντικές δράσεις: </label>
 <div class="resizable-textarea"><span><textarea cols="60" rows="5" name="Εθελοντικές_δράσεις" id="edit-Εθελοντικές-δράσεις" class="form-textarea resizable textarea-processed"></textarea><div class="grippie" style="margin-right: -6px;"></div></span></div>
 <div class="description">Εαν έχετε πάρει μέρος σε εθελοντικές δράσεις στο παρελθόν περιγράψτε ποιο ήταν/είναι το αντικείμενο.</div>
</div></div>


</fieldset>
<fieldset class=" collapsible"><legend class="collapse-processed"><a href="#">ΔΙΑΘΕΣΙΜΟΤΗΤΑ</a></legend><div class="fieldset-wrapper"><div class="form-item" id="edit-Συχνότητα-συνεισφοράς-wrapper">
 <label for="edit-Συχνότητα-συνεισφοράς">Συχνότητα_συνεισφοράς: </label>
 <select name="Συχνότητα_συνεισφοράς" class="form-select" id="edit-Συχνότητα-συνεισφοράς"><option value="" selected="selected">- Επιλέξτε -</option><option value="1-2 φορές την εβδομάδα">1-2 φορές την εβδομάδα</option><option value="1-2 φορές το δεκαπενθήμερο">1-2 φορές το δεκαπενθήμερο</option><option value="1-2 φορές τον μήνα">1-2 φορές τον μήνα</option></select>
</div><div class="form-item">
 <label>Χρόνοι συνεισφοράς: </label>
 <div class="form-checkboxes"><div class="form-item" id="edit-Χρόνοι-συνεισφοράς-Πρωί-wrapper">
 <label class="option" for="edit-Χρόνοι-συνεισφοράς-Πρωί"><input type="checkbox" name="Χρόνοι_συνεισφοράς[Πρωί]" id="edit-Χρόνοι-συνεισφοράς-Πρωί" value="Πρωί" class="form-checkbox"> Πρωί</label>
</div>
<div class="form-item" id="edit-Χρόνοι-συνεισφοράς-Απογεύμα-wrapper">
 <label class="option" for="edit-Χρόνοι-συνεισφοράς-Απογεύμα"><input type="checkbox" name="Χρόνοι_συνεισφοράς[Απογεύμα]" id="edit-Χρόνοι-συνεισφοράς-Απογεύμα" value="Απογεύμα" class="form-checkbox"> Απογεύμα</label>
</div>
<div class="form-item" id="edit-Χρόνοι-συνεισφοράς-Σαββατοκύριακο-wrapper">
 <label class="option" for="edit-Χρόνοι-συνεισφοράς-Σαββατοκύριακο"><input type="checkbox" name="Χρόνοι_συνεισφοράς[Σαββατοκύριακο]" id="edit-Χρόνοι-συνεισφοράς-Σαββατοκύριακο" value="Σαββατοκύριακο" class="form-checkbox"> Σαββατοκύριακο</label>
</div>
</div>
</div></div>

</fieldset>
<fieldset class=" collapsible"><legend class="collapse-processed"><a href="#">ΠΕΡΙΟΧΕΣ ΕΝΔΙΑΦΕΡΟΝΤΩΝ</a></legend><div class="fieldset-wrapper"><div class="form-item" id="edit-πολιτισμός-και-εκπαίδευση-wrapper">
 <label class="option" for="edit-πολιτισμός-και-εκπαίδευση"><input type="checkbox" name="πολιτισμός_και_εκπαίδευση" id="edit-πολιτισμός-και-εκπαίδευση" value="ΝΑΙ" class="form-checkbox"> Πολιτισμός  και εκπαίδευση</label>
</div><div class="form-item" id="edit-αθλητισμός-wrapper">
 <label class="option" for="edit-αθλητισμός"><input type="checkbox" name="αθλητισμός" id="edit-αθλητισμός" value="ΝΑΙ" class="form-checkbox"> Αθλητισμός</label>
</div><div class="form-item">
 <label>Περιβάλλον: </label>
 <div class="form-checkboxes"><div class="form-item" id="edit-περιβάλλον-ενημέρωση-ευαισθητοποίηση-πολιτών-σε-περιβαλλοντικά-θέματα-wrapper">
 <label class="option" for="edit-περιβάλλον-ενημέρωση-ευαισθητοποίηση-πολιτών-σε-περιβαλλοντικά-θέματα"><input type="checkbox" name="περιβάλλον[ενημέρωση-ευαισθητοποίηση πολιτών σε περιβαλλοντικά θέματα]" id="edit-περιβάλλον-ενημέρωση-ευαισθητοποίηση-πολιτών-σε-περιβαλλοντικά-θέματα" value="ενημέρωση-ευαισθητοποίηση πολιτών σε περιβαλλοντικά θέματα" class="form-checkbox"> ενημέρωση-ευαισθητοποίηση πολιτών σε περιβαλλοντικά θέματα</label>
</div>
<div class="form-item" id="edit-περιβάλλον-καθαρισμός-δημοσίου-χώρου-wrapper">
 <label class="option" for="edit-περιβάλλον-καθαρισμός-δημοσίου-χώρου"><input type="checkbox" name="περιβάλλον[καθαρισμός δημοσίου χώρου]" id="edit-περιβάλλον-καθαρισμός-δημοσίου-χώρου" value="καθαρισμός δημοσίου χώρου" class="form-checkbox"> καθαρισμός δημοσίου χώρου</label>
</div>
<div class="form-item" id="edit-περιβάλλον-βάψιμο-επιφανειών-wrapper">
 <label class="option" for="edit-περιβάλλον-βάψιμο-επιφανειών"><input type="checkbox" name="περιβάλλον[βάψιμο επιφανειών]" id="edit-περιβάλλον-βάψιμο-επιφανειών" value="βάψιμο επιφανειών" class="form-checkbox"> βάψιμο επιφανειών</label>
</div>
<div class="form-item" id="edit-περιβάλλον-antigraffiti-wrapper">
 <label class="option" for="edit-περιβάλλον-antigraffiti"><input type="checkbox" name="περιβάλλον[antigraffiti]" id="edit-περιβάλλον-antigraffiti" value="antigraffiti" class="form-checkbox"> antigraffiti</label>
</div>
<div class="form-item" id="edit-περιβάλλον-φύτευση-wrapper">
 <label class="option" for="edit-περιβάλλον-φύτευση"><input type="checkbox" name="περιβάλλον[φύτευση]" id="edit-περιβάλλον-φύτευση" value="φύτευση" class="form-checkbox"> φύτευση</label>
</div>
</div>
</div><div class="form-item">
 <label>Κοινωνική αλληλεγγύη: </label>
 <div class="form-checkboxes"><div class="form-item" id="edit-κοινωνική-αλληλεγγύη-Κόμβος-Αλληλεγγύης-Πολιτών-wrapper">
 <label class="option" for="edit-κοινωνική-αλληλεγγύη-Κόμβος-Αλληλεγγύης-Πολιτών"><input type="checkbox" name="κοινωνική_αλληλεγγύη[Κόμβος Αλληλεγγύης Πολιτών]" id="edit-κοινωνική-αλληλεγγύη-Κόμβος-Αλληλεγγύης-Πολιτών" value="Κόμβος Αλληλεγγύης Πολιτών" class="form-checkbox"> Κόμβος Αλληλεγγύης Πολιτών</label>
</div>
<div class="form-item" id="edit-κοινωνική-αλληλεγγύη-Παροχή-φροντίδας-ως-εθελοντής-γείτονας-wrapper">
 <label class="option" for="edit-κοινωνική-αλληλεγγύη-Παροχή-φροντίδας-ως-εθελοντής-γείτονας"><input type="checkbox" name="κοινωνική_αλληλεγγύη[Παροχή φροντίδας ως εθελοντής γείτονας]" id="edit-κοινωνική-αλληλεγγύη-Παροχή-φροντίδας-ως-εθελοντής-γείτονας" value="Παροχή φροντίδας ως εθελοντής γείτονας" class="form-checkbox"> Παροχή φροντίδας ως εθελοντής γείτονας</label>
</div>
</div>
</div></div>



</fieldset>

     <br><a href="/ethelontismos/symetoxh #oroi" class="intlink lightbox-processed" rel="lightmodal[search|width:600px; height:400px; scrolling:none;]"><strong>Όροι και Προϋποθέσεις Συμμετοχής</strong></a>
 <div style="display:none">
<div id="oroi" style="text-align:left;">
<h3>Δηλώνω υπεύθυνα ότι:</h3>
<p>Όλα τα ανωτέρω στοιχεία είναι αληθή και σωστά.</p>
<p>Γνωρίζω ότι τα ανωτέρω στοιχεία θα παραμείνουν στο φορέα και αποδέχομαι ότι ο Δήμος Αθηναίων δύναται να επεξεργαστεί δεδομένα προσωπικού χαρακτήρα μου και ειδικότερα τα εδώ αναφερόμενα δεδομένα μου για τους σκοπούς οργάνωσης και πραγματοποίησης των εθελοντικών δράσεων. </p>
<p>Δεν υφίσταται σχέση εργασίας ή έργου μεταξύ εμού και του Γραφείου Εθελοντισμού του Δήμου Αθηναίων για τις εθελοντικές υπηρεσίες που προσφέρω.</p>
<p>Ουδεμία απαίτηση χρηματική ή άλλης αποζημίωσης έχω έναντι του Γραφείου Εθελοντισμού  λόγω της ανάληψης των ανωτέρω αναφερόμενων εργασιών και της εθελοντικής μου προσφοράς σε αυτό.</p>
<p>Δηλώνω ότι δεν αντιμετωπίζω προβλήματα υγείας που θα μπορούσαν να επηρεάσουν την παροχή των ανωτέρω εθελοντικών υπηρεσιών.</p>
<p>Στις εργασίες στις οποίες συμμετέχω εθελοντικά το Γραφείο Εθελοντισμού θα μπορεί να αναγράφει το όνομά μου εφόσον το επιθυμώ και μετά από δήλωσή μου.</p>
<p>Το υλικό που το Γραφείο Εθελοντισμού μου παράσχει για την υλοποίηση των εργασιών που αναλαμβάνω καθώς και τα παραγόμενα αποτελέσματα και προϊόντα αυτών ανήκουν αποκλειστικά και μόνον στο Γραφείο και ως εκ τούτου δεν έχω κανένα δικαίωμα (συμπεριλαμβανομένων και των πνευματικών) χρήσης, δημοσίευσης, πώλησης ή άλλο επί αυτών.</p>
<p>Μετά το πέρας της εθελοντικής μου εργασίας υποχρεούμαι να επιστρέψω στο Γραφείο Εθελοντισμού το υλικό που μου έχει διατεθεί για το λόγο αυτό.</p>
<p>Κατά την διάρκεια υλοποίησης των εθελοντικών εργασιών που αναλαμβάνω, οφείλω να τηρώ τα χρονικά πλαίσια που μου έχουν τεθεί από τον Φορέα και να ακολουθώ τις σχετικές υποδείξεις και οδηγίες που μου δίνονται.</p>
<p>Το Γραφείο Εθελοντισμού έχει το δικαίωμα να με παύσει από τις αρμοδιότητές μου ή να αφαιρέσει τμήμα των εθελοντικών εργασιών που αναλαμβάνω.</p>
<p>Κανένα άλλο δικαίωμα ή απαίτηση έχω έναντι του Γραφείου Εθελοντισμού.</p></div></div>
<div class="form-item" id="edit-oroi-wrapper">
 <label class="option" for="edit-oroi"><input type="checkbox" name="oroi" id="edit-oroi" value="1" class="form-checkbox required"> Συμφωνώ</label>
</div>


   Σημειώνεται ότι τα προσωπικά και άλλα δεδομένα που θα συμπληρωθούν στην παρούσα αίτηση θα διατηρηθούν στο αρχείο του Δήμου Αθηναίων, δεν θα αξιοποιηθούν για οποιονδήποτε άλλο σκοπό πέρα από την εθελοντική συμμετοχή στα προγράμματα του Δήμου, και δεν πρόκειται τρίτοι να έχουν πρόσβαση σ’ αυτά, τηρουμένων των ισχυουσών διατάξεων και ιδίως του άρθρου 10 ν. 2472/1997.<br><div class="readon"><input class="button" type="submit" name="op" id="edit-submit" value="Αποστολή"></div><input type="hidden" name="form_build_id" id="form-7e2651a9f659467767dd107ebf13ed4f" value="form-7e2651a9f659467767dd107ebf13ed4f">
<input type="hidden" name="form_id" id="edit-ethelontismosform-my-form" value="ethelontismosform_my_form">

</div>


                {!! Form::close() !!}
