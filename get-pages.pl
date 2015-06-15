#!/usr/bin/env perl

use v5.20;
use utf8;
use strict;
use warnings;

use URL::Encode;
use Path::Tiny;

binmode STDOUT, ':utf8';

my $base = 'http://seoulcloset.org/%s/';
while (<DATA>) {
    chomp;

    my $url = $_;
    my $str = URL::Encode::url_decode_utf8($url);

    my $file = "$str.txt";
    system 'wget', '-O', $file, sprintf($base, $url);
    system 'dos2unix', $file;

    my $content = path($file)->slurp_utf8;
    $content =~ s{\A.*?^</div> <!-- end. navbar navbar-inverse navbar-fixed-top"-->\n}{}gms;
    $content =~ s{^  <footer class="content-info".*}{}gms;

    $content =~ s{http://seoulcloset.org/}{<%= url_for '/' %>}gms;
    path($file)->spew_utf8($content);

    sleep 1;
}

__DATA__
%ea%b6%8c%ec%9c%a0%ea%b2%bd-%eb%8b%98
%ea%b7%80%ec%b0%ae%ea%b3%a0-%ec%96%b4%eb%a0%b5%eb%8d%98-%ec%98%b7%ec%a0%95%eb%a6%ac%ea%b0%80-%ec%89%ac%ec%9b%8c%ec%a1%8c%ec%96%b4%ec%9a%94
%ea%b9%80%ea%b2%bd%ed%9d%ac-%eb%8b%98
%ea%b9%80%eb%ac%b8%ec%98%81-%eb%8b%98
%ea%b9%80%eb%b3%b4%eb%af%b8-%eb%8b%98
%ea%b9%80%ec%86%8c%ec%97%b0-%eb%8b%98
%ea%b9%80%ec%a3%bc%ed%9d%ac-%eb%8b%98
%eb%82%98%eb%88%84%ea%b8%b0-%ec%9c%84%ed%95%b4-%ec%8b%a0%ec%b2%ad%ed%96%88%ec%8a%b5%eb%8b%88%eb%8b%a4
%eb%82%a8%ed%8e%b8%ea%b3%bc%ec%9d%98-%ec%b6%94%ec%96%b5%ec%9d%b4-%eb%8b%b4%ea%b8%b4-%ea%b2%b0%ed%98%bc%ec%98%88%eb%b3%b5%ec%9d%b4%ec%97%90%ec%9a%94
%eb%91%90%ea%b7%bc%ea%b1%b0%eb%a6%ac%eb%8a%94-%eb%a7%88%ec%9d%8c%ec%9c%bc%eb%a1%9c-%ec%9e%85%ec%97%88%eb%8d%98-%ec%98%b7%eb%93%a4%ec%9e%85%eb%8b%88%eb%8b%a4
%eb%93%9c%eb%94%94%ec%96%b4-%eb%91%98%ec%a7%b8-%ec%98%b7%ec%9e%a5%ec%9d%b4-%ec%83%9d%ea%b2%bc%ec%96%b4%ec%9a%94
%eb%a7%88%ec%9d%8c-%ea%b0%80%eb%b3%8d%ea%b2%8c-%ec%9d%b4%ec%82%ac%ed%95%a0-%ec%88%98-%ec%9e%88%ea%b2%8c-%eb%90%98%ec%97%88%ec%96%b4%ec%9a%94
%eb%a7%88%ec%a3%bc%ed%98%b8-%eb%8b%98
%eb%a7%a4%ec%a3%bc-%ec%98%a4%ec%8b%9c%eb%a9%b4-%ec%a2%8b%ea%b2%a0%ec%96%b4%ec%9a%94
%eb%a9%b4%ec%a0%91%eb%b3%b4%eb%a9%b4-%eb%b6%99%eb%8a%94%eb%8b%a4%eb%8a%94-%ea%b0%81%ec%98%a4
%eb%a9%b4%ec%a0%91%ec%84%b1%ea%b3%b5%eb%a5%a0-100-%ec%a0%95%ec%9e%a5%ec%9e%85%eb%8b%88%eb%8b%a4
%eb%aa%a8%ec%96%91%eb%8f%84-%ec%98%88%ec%81%98%ea%b2%8c-%ed%95%9c-%eb%88%88%ec%97%90-%ec%8f%99-%eb%93%a4%ec%96%b4%ec%98%a4%eb%84%a4%ec%9a%94
%eb%ac%b4%ea%b1%b0%ec%9b%a0%eb%8d%98-%eb%a7%88%ec%9d%8c%ec%9d%b4-%ea%b0%80%eb%b2%bc%ec%9b%8c%ec%a1%8c%ec%96%b4%ec%9a%94
%eb%b0%95%ea%b8%b0%ea%b2%bd-%eb%8b%98
%eb%b0%95%eb%82%98%ec%98%81-%eb%8b%98
%ec%83%9d%ea%b0%81%ec%a7%80%eb%8f%84-%eb%aa%bb%ed%95%9c-%ea%b3%b5%ea%b0%84%ec%9d%98-%ec%97%ac%ec%9c%a0%ea%b0%80-%ec%83%9d%ea%b2%bc%eb%84%a4%ec%9a%94
%ec%84%9c%ec%8b%a0%ec%98%81-%eb%8b%98
%ec%84%9c%ec%9d%80%ec%a7%80-%eb%8b%98
%ec%95%84%ea%b9%8c%ec%9b%8c%ec%84%9c-%ed%95%9c%eb%b2%88%eb%8f%84-%ec%95%88-%ec%9e%85%ec%9d%80-%ec%98%b7%ec%9d%b4%ec%a7%80%eb%a7%8c
%ec%95%9e%ec%9c%bc%eb%a1%9c%eb%8a%94-%ec%a0%95%eb%a6%ac%ed%95%b4%ea%b0%80%eb%a9%b0-%ec%82%b4%ea%b2%a0%eb%8b%a4%eb%8a%94-%eb%8b%a4%ec%a7%90
%ec%96%b4%eb%96%bb%ea%b2%8c-%ec%9d%b4%eb%a0%87%ea%b2%8c-%ec%a0%95%eb%a6%ac%ea%b0%80-%eb%90%98%eb%8a%94%ec%a7%80-%ec%8b%a0%ea%b8%b0%ed%95%b4%ec%9a%94
%ec%96%b8%ec%a0%a0%ea%b0%80%eb%8a%94-%ed%95%b4%ec%95%bc%ec%a7%80-%ed%96%88%eb%8d%98-%eb%94%b1-%ea%b7%b8-%eb%aa%a8%ec%8a%b5
%ec%97%b4%eb%a6%b0%ec%98%b7%ec%9e%a5-%ed%99%8d%eb%b3%b4-%eb%a7%8e%ec%9d%b4-%ed%95%a0%ea%b2%8c%ec%9a%94
%ec%98%a4%eb%a1%9c%eb%a1%9c%eb%a1%9c%eb%a1%9c%eb%9d%bc%eb%9d%bc%eb%9d%bc
%ec%98%a4%eb%af%bc%ea%b2%bd-%eb%8b%98
%ec%98%b7%eb%8f%84-%ea%b9%a8%eb%81%97%ed%95%98%ea%b2%8c-%eb%a7%88%ec%9d%8c%eb%8f%84-%eb%a7%91%ea%b2%8c
%ec%98%b7-%ea%b3%a0%eb%a5%b4%eb%8a%94-%ec%8b%9c%ea%b0%84%ec%9d%b4-%eb%8b%a8%ec%b6%95%eb%90%a0-%ea%b1%b0-%ea%b0%99%ec%95%84%ec%9a%94
%ec%9c%a0%ed%96%89%ec%9d%b4-%ec%a7%80%eb%82%9c-%ec%a0%95%ec%9e%a5-%eb%a9%8b%ec%a7%80%ea%b2%8c-%eb%a6%ac%ed%8f%bc%ed%95%b4%ec%a3%bc%ec%84%b8%ec%9a%94
%ec%9c%a4%ed%98%b8%ec%a0%95
%ec%9d%b4%eb%9f%b0-%ea%b2%8c-%ec%82%ac%eb%9e%8c-%ec%82%ac%eb%8a%94-%ec%a7%91%ec%9d%b4%ea%b5%ac%eb%82%98
%ec%9d%b4%ec%a0%95%eb%af%b8-%eb%8b%98
%ec%9d%b4-%ec%98%b7-%ec%9e%85%ea%b3%a0-%ed%95%9c%eb%b2%88%ec%97%90-%eb%b6%99%ec%97%88%ec%96%b4%ec%9a%94
%ec%9d%bc%eb%b0%98%ec%9d%b8%ec%9d%98-%ec%86%90%ea%b8%b8%ea%b3%bc-%ec%b0%a8%ec%9b%90%ec%9d%b4-%eb%8b%ac%eb%9d%bc%ec%9a%94
%ec%a0%95%eb%a6%ac%ec%9d%98-%ed%95%84%ec%9a%94%ec%84%b1%ec%9d%84-%ec%a0%88%ec%8b%a4%ed%9e%88-%eb%8a%90%ea%bc%88%ec%96%b4%ec%9a%94
%ec%a0%9c-%eb%a7%98%ea%b9%8c%ec%a7%80-%ec%8b%9c%ec%9b%90%ed%95%b4%ec%a1%8c%ec%96%b4%ec%9a%94
%ec%a2%8b%ec%9d%80-%ec%9d%bc%ec%97%90-%ec%93%b0%ec%9d%b4%ea%b8%b8-%eb%b0%94%eb%9e%84-%eb%bf%90%ec%9e%85%eb%8b%88%eb%8b%a4
%ec%a2%8b%ec%9d%80-%ec%9d%bc%ec%97%90-%ec%93%b0%ec%9d%b8%eb%8b%a4%eb%8b%88-%eb%8d%94-%ec%a2%8b%ec%95%84%ec%9a%94
%ec%b4%88%eb%b3%b4%eb%a7%98%ec%9d%84-%ec%9c%84%ed%95%9c-%ec%a0%95%eb%a6%ac-%eb%85%b8%ed%95%98%ec%9a%b0-%eb%b0%b0%ec%9b%a0%ec%96%b4%ec%9a%94
%ec%b5%9c%eb%af%b8%ea%b2%bd-%eb%8b%98
%ec%b5%9c%ec%88%98%ec%97%b0-%eb%8b%98
%ec%b9%9c%ea%b5%ac%ec%99%80-%eb%b0%b1%ed%99%94%ec%a0%90%ec%9d%84-%eb%8f%8c%ec%95%84%eb%8b%a4%eb%8b%8c-%ec%b6%94%ec%96%b5
%ed%85%8c%ec%8a%a4%ed%8a%b8-10
%ed%85%8c%ec%8a%a4%ed%8a%b8-11
%ed%85%8c%ec%8a%a4%ed%8a%b8-13-2
%ed%85%8c%ec%8a%a4%ed%8a%b8-13
%ed%85%8c%ec%8a%a4%ed%8a%b8-2
%ed%85%8c%ec%8a%a4%ed%8a%b8-3
%ed%85%8c%ec%8a%a4%ed%8a%b8-5
%ed%85%8c%ec%8a%a4%ed%8a%b8-8
%ed%85%8c%ec%8a%a4%ed%8a%b8-9
%ed%85%8c%ec%8a%a4%ed%8a%b84
%ed%95%98%ec%84%b1%ea%b3%b5-%eb%8b%98
%ed%95%98%ec%a7%80%ed%9d%ac-%eb%8b%98
1036
1052
1149
20%eb%8c%80-%ec%b2%ad%eb%85%84%eb%93%a4-%ed%99%94%ec%9d%b4%ed%8c%85%ec%9e%85%eb%8b%88%eb%8b%a4
842
848
949
973
993
