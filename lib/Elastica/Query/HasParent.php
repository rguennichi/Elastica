<?php
namespace Elastica\Query;

use Elastica\Query as BaseQuery;

/**
 * Returns child documents having parent docs matching the query.
 *
 * @link http://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-has-parent-query.html
 */
class HasParent extends AbstractQuery
{
    /**
     * Construct HasChild Query.
     *
     * @param string|\Elastica\Query|\Elastica\Query\AbstractQuery $query
     * @param string                                               $type  Parent document type
     */
    public function __construct($query, $type)
    {
        $this->setQuery($query);
        $this->setType($type);
    }

    /**
     * Sets query object.
     *
     * @param string|\Elastica\Query|\Elastica\Query\AbstractQuery $query
     *
     * @return $this
     */
    public function setQuery($query)
    {
        return $this->setParam('query', BaseQuery::create($query));
    }

    /**
     * Set type of the parent document.
     *
     * @param string $type Parent document type
     *
     * @return $this
     */
    public function setType($type)
    {
        return $this->setParam('type', $type);
    }

    /**
     * Sets the scope.
     *
     * @param string $scope Scope
     *
     * @return $this
     */
    public function setScope($scope)
    {
        return $this->setParam('_scope', $scope);
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        $array = parent::toArray();

        if (isset($array[$this->_getBaseName()]['query'])) {
            $array[$this->_getBaseName()]['query'] = $array[$this->_getBaseName()]['query']['query'];
        }

        return $array;
    }
}

