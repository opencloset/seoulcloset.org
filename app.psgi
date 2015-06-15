#!/usr/bin/env perl

use v5.20;
use Mojolicious::Lite;

use Path::Tiny;

app->defaults( %{ plugin 'Config' => { default => {
    secrets => [ 'test' ],
}}});

get '/'                         => 'index';
get '/about'                    => 'about';
get '/apply'                    => 'apply';
get '/map'                      => 'map';
get '/category/stories/'        => 'page-1';
get '/category/stories/page/1/' => 'page-1';
get '/category/stories/page/2/' => 'page-2';
get '/category/stories/page/3/' => 'page-3';
get '/category/stories/page/4/' => 'page-4';
get '/category/stories/page/5/' => 'page-5';

get '/:node/' => sub {
    my $c = shift;

    my $node = $c->param('node') || q{};
    unless ($node) {
        $c->reply->not_found;
        return;
    }

    my $path = path("pages/$node.txt");
    unless ( $path->exists ) {
        $c->reply->not_found;
        return;
    }

    my $content = $path->slurp_utf8;
    $content =~ m{<h1 class="entry-title">(.*?)</h1>};
    my $title = $1;

    $c->stash(
        content => $content,
        title   => $title,
    );
} => 'node';

app->secrets( app->defaults->{secrets} );
app->start;
