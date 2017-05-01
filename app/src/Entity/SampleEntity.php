<?php

namespace Project\Entity;

/**
 * Class SampleEntity
 * @package Project\Entity
 *
 * @Entity
 */
class SampleEntity
{

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @Column(type="integer")
     */
    protected $firstProperty;
}