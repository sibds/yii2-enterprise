class codeception {
  exec { 'codeception_install':
    command => 'wget http://codeception.com/codecept.phar && sudo mv ./codecept.phar /usr/local/bin/codecept',
    path    => '/usr/bin:/usr/sbin',
  }
  ->
  file { "/usr/local/bin/codecept":
    ensure => present,
    owner => root,
    group => root,
    mode => 755,
  }
}
