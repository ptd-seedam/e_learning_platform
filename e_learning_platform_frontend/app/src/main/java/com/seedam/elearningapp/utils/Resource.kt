package com.seedam.elearningapp.utils

// Lớp 'sealed' (kín) này chỉ có 3 trạng thái con có thể xảy ra
sealed class Resource<T>(
    val data: T? = null,
    val message: String? = null
) {

    /**
     * Trạng thái thành công, mang theo dữ liệu [data].
     */
    class Success<T>(data: T) : Resource<T>(data)

    /**
     * Trạng thái thất bại, mang theo thông báo lỗi [message].
     */
    class Error<T>(message: String, data: T? = null) : Resource<T>(data, message)

    /**
     * Trạng thái đang tải, có thể tùy chọn mang theo dữ liệu cũ [data] (ví dụ: khi làm mới).
     */
    class Loading<T>(data: T? = null) : Resource<T>(data)
}