package com.seedam.stuonadminrule.data.mappers

import com.seedam.stuonadminrule.data.remote.dto.ReviewDto
import com.seedam.stuonadminrule.domain.model.Review

fun ReviewDto.toReview(): Review {
    return Review(
        id = id,
        courseId = courseId,
        userId = userId,
        rating = rating,
        comment = comment,
        reviewDate = reviewDate
    )
}
