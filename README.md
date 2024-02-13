# Blog App

> test password = p@$$m3In

## Notes
```sql
alter table blogs AUTO_INCREMENT=6
```
```php
use Illuminate\Support\Facades\Hash;

Hash::check('p@$$m3In', $user->password); // will return true is passed. false if not
```
```php

<script src="/js/toast-scripts.js"></script>
```