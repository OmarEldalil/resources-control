اضغط هنا لأستعادة كلمة المرور الخاصة بك: <a href="{{ $link = route('get_reset_email', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
