<?php
namespace Spine;

/**
 * The Pipe class to attach filters to
 *
 * @package Spine
 * @author     Lance Rushing
 * @since      2014-02-05
 */

class Pipe implements Filter
{
    /**
     *
     * @var array $filters to hold the pipe's filters
     */
    private $filters = array();

    /**
     * @param Filter $filter
     *
     * @return Pipe
     */
    public function add(Filter $filter)
    {
        $this->filters[] = $filter;
        return $this;
    }

    /**
     * @return boolean
     */
    public function execute()
    {
        $result = false;
        /** @var Filter $filter  */
        foreach ($this->filters as $filter) {
            $result = $filter->execute();
            if ($result === false) {
                break;
            }
        }

        return $result;
    }
}