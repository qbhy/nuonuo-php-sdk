<?php
/**
 * User: 96qbhy
 * Date: 2018/3/28
 * Time: 下午3:21
 */

namespace Qbhy\Nuonuo\Business;


/**
 * Class IntelligentCoding
 *
 * @link      https://open.jss.com.cn//interplatform/getApiList.do?index=3
 * @package   Qbhy\Nuonuo\IntelligentCoding
 */
class IntelligentCoding extends NuonuoBusiness
{
    /**
     * 批量获取商品税收编码接口
     *
     * @param string  $service Y    batchQueryCodeDK    50    服务名称，取常量：batchQueryCodeDK
     * @param string  $tax_num Y    91330000692368905R    30    用户税号
     * @param array[] $param   Y
     *
     * @return array
     */
    public function checkEInvoice($service, $tax_num, $param)
    {
        /**
         * $param[] 应包含如下字段
         * u_category    String    N    货物    50    编码大类
         * u_name    String    Y    电脑    100    物品名称
         * u_num    String    N    5    10    序号
         * u_type    String    N    Y460    100    型号
         */
        return $this->request('nuonuo.electronInvoice.CheckEInvoice', compact('service', 'tax_num', 'param'));
    }

}