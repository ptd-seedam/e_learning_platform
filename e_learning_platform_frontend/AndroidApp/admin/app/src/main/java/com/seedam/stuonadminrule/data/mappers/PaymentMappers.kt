package com.seedam.stuonadminrule.data.mappers

import com.seedam.stuonadminrule.data.remote.dto.PaymentDto
import com.seedam.stuonadminrule.domain.model.Payment

fun PaymentDto.toPayment(): Payment {
    return Payment(
        id = id,
        enrollmentId = enrollmentId,
        amount = amount,
        paymentDate = paymentDate,
        paymentMethod = paymentMethod,
        status = status
    )
}
