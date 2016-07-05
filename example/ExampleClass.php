<?php

namespace Schneidoa\EasyAnnotation\Example;

class ExampleClass
{
    /**
     *
     * @Column(user_id)
     * @Json({"data": 1})
     */
    public $userId;

    /**
     *
     * @Column(username)
     * @NotNull()
     * @Json({"data": "dummy"})
     */
    public $username;
}