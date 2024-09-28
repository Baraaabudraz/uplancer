<x-mail::message>
# New Inquiry from Up Lancer

A new inquiry has been submitted. Here are the details:

---

**Company Name:** {{ $formData['company_name'] }}<br>
**Name:** {{ $formData['name'] }}<br>
**Email:** {{ $formData['email'] }}<br>
**Phone Number:** {{ $formData['phone'] }}<br>

---

**What can Up Lancer do for you?**<br>
{{ $formData['service'] == 'option1' ? 'Create an Amazing New Product' : ($formData['service'] == 'option2' ? 'Make my great product even greater' : 'Something else') }}

---

**More Information:**<br>
{{ $formData['message'] }}

---

**Budget:**
{{ $formData['budget'] == 'option1' ? '$1000-$5000' : ($formData['budget'] == 'option2' ? '$5000-$10,000' : ($formData['budget'] == 'option3' ? '$10,000-$20,000' : '$20,000 or more')) }}

---

**How did you hear about Up Lancer?**<br>
{{ $formData['hear'] }}


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
