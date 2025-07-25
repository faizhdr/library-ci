<?php

function is_active($segment)
{
    return service('uri')->getSegment(1) == $segment ? 'active' : '';
}