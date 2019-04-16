@php
$applicant = DB::table('users')->where('id',$user_id)->first();
@endphp<!DOCTYPE html>

<html>

<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

</style>

</head>

<body>

<p>বাণিজ্য মেলা আয়োজনের অনুমোদনের জন্য অনলাইন আবেদন ফরম</p>

<table>
<tbody>
<tr>
<td width="5%">১.</td>
<td>মেলা/প্রদর্শনীর নাম : {{ $festival_name }}</td>
</tr>
<tr>
<td width="5%">২.</td>
<td>মেলার ধরণ : {{ $festival_type == 'national' ? 'দেশী' : 'আন্তর্জাতিক' }}</td>
</tr>
<tr>
<td width="5%">৩.</td>
<td>মেলা/প্রদর্শনীর মেয়াদকাল : {{ date('F d, Y', strtotime($from) ) }} - {{ date('F d, Y', strtotime($to) ) }}</td>
</tr>
<tr>
<td width="5%">৪.</td>
<td>মেলা/প্রদর্শনীর স্থান (স্থান বরাদ্দপত্র সংযুক্ত করতে হবে) : {{ $festival_place }}</td>
</tr>
<tr>
<td width="5%">৫.</td>
<td>আবেদনকারী প্রতিষ্ঠান/সংগঠনের নাম : {{ $applicant->organization_name }}</td>
</tr>
<tr>
<td width="5%">৬.</td>
<td>
    প্রতিষ্ঠান/সংগঠনের ঠিকানা : {{ $applicant->organization_address }} ****
    টেলিফোন নম্বর: মোবাইল নম্বর: ইমেইল :
</td>
</tr>
<tr>
<td width="5%">৭.</td>
<td>প্রধান নির্বাহীর নাম/যোগাযোগকারী কর্মকর্তার নাম : </td>
</tr>
<tr>
<td width="5%">৮.</td>
<td>কোম্পানি রেজি: নম্বর/ট্রেড লাইসেন্স (হালনাগাদ কপি সংযুক্ত করতে হবে) : {{ $reg_no }}</td>
</tr>
<tr>
<td width="5%">৯.</td>
<td>টিন সার্টিফিকেট ও আয়কর সার্টিফিকেট (হালনাগাদ কপি সংযুক্ত করতে হবে) : {{ $tin_no }}</td>
</tr>
<tr>
<td width="5%">১০.</td>
<td>ভ্যাট রেজি: নম্বর (হালনাগাদ কপি সংযুক্ত করতে হবে) : {{ $vat_reg_no }}</td>
</tr>
<tr>
<td width="5%">১১.</td>
<td>চালান নম্বর : {{ $chaalan_no }} তারিখ : ব্যাংকের নাম : {{ $bank_name }} শাখার নাম: {{ $branch_name }}</td>
</tr>
<tr>
<td width="5%">১২.</td>
<td>চালান ( কোড নং-১১৭০১০০০১২৬৮১) জমাকৃত টাকার পরিমাণ:
{{ $festival_type == 'national' ? 'স্থানীয় মেলা আয়োজনের ফি ৫০০০/- (পাঁচ হাজার) টাকা।' : 'আন্তর্জাতিক মেলা আয়োজনের ফি ২০০ মার্কিন ডলারের সমপরিমাণ টাকা' }}
</td>
</tr>
</tbody>
</table>

</body>
</html>